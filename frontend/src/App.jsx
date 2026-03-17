import React, { useState, useEffect } from 'react';
import { Search, Plus, MessageSquare, TrendingUp, User, LogOut, ChevronRight, Bell, Sparkles, Zap } from 'lucide-react';
import { motion, AnimatePresence } from 'framer-motion';

const NeuroCard = ({ children, className = "", hover = true }) => (
  <motion.div
    initial={{ opacity: 0, y: 20 }}
    animate={{ opacity: 1, y: 0 }}
    whileHover={hover ? { y: -5 } : {}}
    transition={{ duration: 0.3 }}
    className={`neuro-card-lg p-6 ${className}`}
  >
    {children}
  </motion.div>
);

const SidebarItem = ({ icon: Icon, label, active = false }) => (
  <motion.button
    whileHover={{ x: 4 }}
    whileTap={{ scale: 0.98 }}
    className={`sidebar-link w-full ${active ? 'active' : ''}`}
  >
    <Icon size={20} className="flex-shrink-0" />
    <span className="font-medium">{label}</span>
  </motion.button>
);

const QuestionCard = ({ title, author, date, answers, votes, tag = "React" }) => (
  <NeuroCard className="cursor-pointer group">
    <div className="flex justify-between items-start mb-4">
      <div className="flex items-center gap-3">
        <motion.div
          whileHover={{ scale: 1.1 }}
          className="w-10 h-10 rounded-lg bg-gradient-to-br from-primary to-secondary flex items-center justify-center overflow-hidden flex-shrink-0"
        >
          <User size={20} className="text-white" />
        </motion.div>
        <div>
          <p className="text-sm font-semibold text-white">{author}</p>
          <p className="text-xs text-slate-400">{date}</p>
        </div>
      </div>
      <motion.div
        whileHover={{ scale: 1.05 }}
        className="px-3 py-1 bg-gradient-to-r from-primary/20 to-secondary/20 text-primary-light text-[10px] font-bold rounded-full uppercase tracking-wider border border-primary/20"
      >
        {tag}
      </motion.div>
    </div>
    <h3 className="text-lg font-bold text-white mb-4 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-primary group-hover:to-secondary group-hover:bg-clip-text transition-all line-clamp-2">
      {title}
    </h3>
    <div className="flex items-center justify-between">
      <div className="flex items-center gap-4 text-slate-400">
        <motion.div whileHover={{ x: 2 }} className="flex items-center gap-2 text-sm cursor-pointer hover:text-primary transition-colors">
          <MessageSquare size={16} />
          <span>{answers}</span>
        </motion.div>
        <motion.div whileHover={{ x: 2 }} className="flex items-center gap-2 text-sm cursor-pointer hover:text-accent transition-colors">
          <TrendingUp size={16} />
          <span>{votes}</span>
        </motion.div>
      </div>
      <motion.div
        initial={{ opacity: 0, x: -10 }}
        whileGroupHover={{ opacity: 1, x: 0 }}
        transition={{ duration: 0.3 }}
      >
        <ChevronRight size={20} className="text-primary" />
      </motion.div>
    </div>
  </NeuroCard>
);

const StatCard = ({ label, value, icon: Icon, color }) => {
  const colorProps = {
    primary: 'from-primary to-secondary',
    accent: 'from-accent to-secondary',
    blue: 'from-secondary to-accent',
  };

  return (
    <NeuroCard className="flex flex-col gap-4">
      <div className="flex items-start justify-between">
        <div>
          <p className="text-xs font-bold text-slate-400 uppercase tracking-widest mb-2">{label}</p>
          <p className="text-4xl font-black bg-gradient-to-r from-white to-slate-300 bg-clip-text text-transparent">{value}</p>
        </div>
        <motion.div
          whileHover={{ rotate: 10, scale: 1.1 }}
          className={`p-3 rounded-xl bg-gradient-to-br ${colorProps[color]} shadow-lg`}
        >
          <Icon size={24} className="text-white" />
        </motion.div>
      </div>
      <motion.div
        initial={{ width: 0 }}
        animate={{ width: '100%' }}
        transition={{ duration: 1 }}
        className={`h-1 rounded-full bg-gradient-to-r ${colorProps[color]}`}
      ></motion.div>
    </NeuroCard>
  );
};

export default function App() {
  const [questions, setQuestions] = useState([
    { id: 1, title: "Optimizing React performance with large datasets?", author: "Elena Gomez", date: "13m ago", answers: 15, votes: 82, tag: "React" },
    { id: 2, title: "How is compilare Item with evaluation and high precision?", author: "Gordo Dev", date: "1h ago", answers: 24, votes: 156, tag: "Laravel" },
    { id: 3, title: "Next.js 14 server actions vs traditional API calls?", author: "Alex Rivers", date: "4h ago", answers: 8, votes: 42, tag: "Next.js" },
    { id: 4, title: "State management in 2024: Is Redux still relevant?", author: "Sarah Chen", date: "Yesterday", answers: 56, votes: 312, tag: "Redux" },
  ]);

  const stats = [
    { label: 'Total Questions', value: '124', icon: MessageSquare, color: 'primary' },
    { label: 'Answers Given', value: '342', icon: Zap, color: 'accent' },
    { label: 'Experts Online', value: '18', icon: User, color: 'blue' },
  ];

  return (
    <div className="min-h-screen bg-background text-slate-200 flex">
      {/* Sidebar */}
      <aside className="w-72 border-r border-primary/10 p-6 space-y-8 hidden lg:flex lg:flex-col">
        <motion.div className="flex items-center gap-3">
          <motion.div
            whileHover={{ rotate: 360 }}
            transition={{ duration: 0.5 }}
            className="w-12 h-12 rounded-xl bg-gradient-to-br from-primary to-secondary flex items-center justify-center shadow-neuro"
          >
            <Sparkles className="text-white" size={28} />
          </motion.div>
          <div>
            <h1 className="text-2xl font-black text-gradient">AskNow</h1>
            <p className="text-xs text-slate-400">Community Q&A</p>
          </div>
        </motion.div>

        <nav className="space-y-2 flex-1">
          <SidebarItem icon={TrendingUp} label="Dashboard" active />
          <SidebarItem icon={MessageSquare} label="Questions" />
          <SidebarItem icon={User} label="My Activity" />
        </nav>

        <div className="pt-6 border-t border-primary/10">
          <p className="text-[10px] font-bold uppercase text-slate-500 tracking-[2px] mb-4 px-2">Top Tags</p>
          <div className="flex flex-wrap gap-2">
            {['React', 'PHP', 'Laravel', 'Docker', 'Vue.js', 'SQL'].map(tag => (
              <motion.span
                key={tag}
                whileHover={{ scale: 1.05, y: -2 }}
                className="px-3 py-2 rounded-lg text-xs font-medium bg-dark-card border border-primary/10 text-slate-300 hover:text-primary hover:border-primary/30 cursor-pointer transition-colors"
              >
                #{tag}
              </motion.span>
            ))}
          </div>
        </div>

        <motion.button
          whileHover={{ x: -4 }}
          className="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-slate-400 hover:text-red-400 hover:bg-red-500/10 transition-all border border-transparent hover:border-red-500/20 mt-auto"
        >
          <LogOut size={20} />
          <span className="font-medium">Logout</span>
        </motion.button>
      </aside>

      {/* Main Content */}
      <main className="flex-1 max-h-screen overflow-y-auto">
        {/* Header */}
        <header className="sticky top-0 z-30 flex items-center justify-between px-8 py-6 backdrop-blur-md border-b border-primary/10">
          <motion.div className="relative w-full max-w-xl group" initial={{ opacity: 0 }} animate={{ opacity: 1 }}>
            <Search className="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-primary transition-colors" size={20} />
            <motion.input
              whileFocus={{ scale: 1.02 }}
              type="text"
              placeholder="Search questions, experts..."
              className="input-field input-field-icon w-full"
            />
          </motion.div>
          <div className="flex items-center gap-4 ml-6">
            <motion.button
              whileHover={{ scale: 1.1 }}
              whileTap={{ scale: 0.95 }}
              className="relative p-3 rounded-xl bg-dark-card border border-primary/10 hover:border-primary/30 transition-colors shadow-neuro"
            >
              <Bell size={20} className="text-slate-300" />
              <motion.span
                animate={{ scale: [1, 1.2, 1] }}
                transition={{ duration: 2, repeat: Infinity }}
                className="absolute top-2 right-2 w-2 h-2 bg-gradient-to-r from-primary to-secondary rounded-full"
              ></motion.span>
            </motion.button>
            <motion.div
              whileHover={{ scale: 1.05 }}
              className="w-11 h-11 rounded-xl bg-gradient-to-br from-primary to-secondary overflow-hidden shadow-neuro cursor-pointer"
            >
              <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Gordo" alt="User" className="w-full h-full" />
            </motion.div>
          </div>
        </header>

        {/* Content */}
        <section className="p-8 max-w-7xl mx-auto space-y-12">
          {/* Welcome Hero */}
          <motion.div
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
            className="flex items-end justify-between"
          >
            <div>
              <h2 className="text-5xl font-black mb-2">
                <span className="text-white">Welcome back, </span>
                <span className="text-gradient">Gordo!</span>
              </h2>
              <p className="text-slate-400 text-lg">Let's solve today's challenges together 💡</p>
            </div>
            <motion.button
              whileHover={{ scale: 1.05, y: -4 }}
              whileTap={{ scale: 0.95 }}
              className="neuro-btn-lg flex items-center gap-2 uppercase tracking-wider"
            >
              <Plus size={20} />
              Ask Question
            </motion.button>
          </motion.div>

          {/* Stats Grid */}
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            {stats.map(stat => (
              <StatCard
                key={stat.label}
                label={stat.label}
                value={stat.value}
                icon={stat.icon}
                color={stat.color}
              />
            ))}
          </div>

          {/* Questions Feed */}
          <motion.div className="space-y-6">
            <div className="flex items-center gap-4">
              <h3 className="text-2xl font-bold text-white">Latest Questions</h3>
              <motion.div
                animate={{ width: ['0%', '100%'] }}
                transition={{ duration: 0.8 }}
                className="h-1 flex-1 bg-gradient-to-r from-primary to-secondary rounded-full"
              ></motion.div>
            </div>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
              <AnimatePresence>
                {questions.map((q, idx) => (
                  <motion.div
                    key={q.id}
                    initial={{ opacity: 0, y: 20 }}
                    animate={{ opacity: 1, y: 0 }}
                    transition={{ delay: idx * 0.1 }}
                  >
                    <QuestionCard {...q} />
                  </motion.div>
                ))}
              </AnimatePresence>
            </div>
          </motion.div>
        </section>
      </main>
    </div>
  );
}

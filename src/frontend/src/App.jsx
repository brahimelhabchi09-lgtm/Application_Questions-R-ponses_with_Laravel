import React, { useState, useEffect } from 'react';
import { Search, Plus, MessageSquare, TrendingUp, User, LogOut, ChevronRight, Bell, Sparkles } from 'lucide-react';
import { motion, AnimatePresence } from 'framer-motion';

const GlassCard = ({ children, className = "" }) => (
  <motion.div
    initial={{ opacity: 0, y: 20 }}
    animate={{ opacity: 1, y: 0 }}
    className={`glass-card p-6 ${className}`}
  >
    {children}
  </motion.div>
);

const SidebarItem = ({ icon: Icon, label, active = false }) => (
  <button className={`flex items-center gap-3 w-full px-4 py-3 rounded-xl transition-all ${active ? 'bg-primary/20 text-primary border border-primary/20 shadow-neon-indigo' : 'text-slate-400 hover:bg-white/5 hover:text-white'
    }`}>
    <Icon size={20} />
    <span className="font-medium">{label}</span>
  </button>
);

const QuestionCard = ({ title, author, date, answers, votes }) => (
  <GlassCard className="hover:border-primary/30 transition-colors cursor-pointer group">
    <div className="flex justify-between items-start mb-4">
      <div className="flex items-center gap-3">
        <div className="w-10 h-10 rounded-full bg-slate-800 border border-white/10 flex items-center justify-center overflow-hidden">
          <User size={20} className="text-slate-400" />
        </div>
        <div>
          <p className="text-sm font-semibold text-white">{author}</p>
          <p className="text-xs text-slate-500">{date}</p>
        </div>
      </div>
      <div className="px-3 py-1 bg-primary/10 text-primary text-[10px] font-bold rounded-full uppercase tracking-wider">
        React
      </div>
    </div>
    <h3 className="text-lg font-bold text-white mb-3 group-hover:text-primary transition-colors line-clamp-2">
      {title}
    </h3>
    <div className="flex items-center gap-6 text-slate-400">
      <div className="flex items-center gap-2 text-sm">
        <MessageSquare size={16} />
        <span>{answers} Reponses</span>
      </div>
      <div className="flex items-center gap-2 text-sm text-accent">
        <TrendingUp size={16} />
        <span>{votes} Votes</span>
      </div>
    </div>
  </GlassCard>
);

export default function App() {
  const [questions, setQuestions] = useState([
    { id: 1, title: "Optimizing React performance with large datasets?", author: "Elena Gomez", date: "13m ago", answers: 15, votes: 82 },
    { id: 2, title: "How is compilare Item with evaluation and high precision?", author: "Gordo Dev", date: "1h ago", answers: 24, votes: 156 },
    { id: 3, title: "Next.js 14 server actions vs traditional API calls?", author: "Alex Rivers", date: "4h ago", answers: 8, votes: 42 },
    { id: 4, title: "State management in 2024: Is Redux still relevant?", author: "Sarah Chen", date: "Yesterday", answers: 56, votes: 312 },
  ]);

  return (
    <div className="min-h-screen bg-[#020617] text-slate-200 flex">
      {/* Sidebar */}
      <aside className="w-72 border-r border-white/5 p-6 space-y-8 hidden lg:block backdrop-blur-2xl">
        <div className="flex items-center gap-3 px-2">
          <div className="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-indigo-600 flex items-center justify-center shadow-neon-indigo">
            <Sparkles className="text-white" size={24} />
          </div>
          <h1 className="text-2xl font-black bg-gradient-to-r from-white to-slate-400 bg-clip-text text-transparent">AskAI</h1>
        </div>

        <nav className="space-y-2">
          <SidebarItem icon={TrendingUp} label="Tableau de bord" active />
          <SidebarItem icon={MessageSquare} label="Questions" />
          <SidebarItem icon={User} label="Mes Activités" />
        </nav>

        <div className="pt-8 border-t border-white/5">
          <h2 className="px-4 text-[10px] font-bold uppercase text-slate-500 tracking-[2px] mb-4">Top Tags</h2>
          <div className="flex flex-wrap gap-2 px-2">
            {['React', 'PHP', 'Laravel', 'UI/UX'].map(tag => (
              <span key={tag} className="px-3 py-1 bg-white/5 rounded-full text-xs hover:bg-white/10 cursor-pointer transition-colors border border-white/5">
                #{tag}
              </span>
            ))}
          </div>
        </div>

        <div className="absolute bottom-6 w-60">
          <button className="flex items-center gap-3 w-full px-4 py-3 rounded-xl hover:bg-red-500/10 text-slate-400 hover:text-red-400 transition-all border border-transparent hover:border-red-500/20">
            <LogOut size={20} />
            <span className="font-medium">Déconnexion</span>
          </button>
        </div>
      </aside>

      {/* Main Content */}
      <main className="flex-1 max-h-screen overflow-y-auto bg-[radial-gradient(circle_at_50%_0%,rgba(99,102,241,0.05)_0%,transparent_50%)]">
        {/* Header */}
        <header className="sticky top-0 z-30 flex items-center justify-between p-6 bg-[#020617]/50 backdrop-blur-md">
          <div className="relative w-full max-w-xl group">
            <Search className="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 group-focus-within:text-primary transition-colors" size={20} />
            <input
              type="text"
              placeholder="Rechercher une discussion, un expert..."
              className="w-full bg-slate-900/40 border border-white/5 flex-1 px-12 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all placeholder:text-slate-600"
            />
          </div>
          <div className="flex items-center gap-4">
            <button className="relative p-2 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition-colors">
              <Bell size={20} />
              <span className="absolute top-2 right-2 w-2 h-2 bg-primary rounded-full shadow-neon-indigo"></span>
            </button>
            <div className="w-10 h-10 rounded-xl bg-slate-800 border border-white/10 overflow-hidden">
              <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=Gordo" alt="User" />
            </div>
          </div>
        </header>

        <section className="p-8 max-w-7xl mx-auto space-y-12">
          {/* Hero Section */}
          <div className="flex items-end justify-between">
            <div>
              <motion.h2
                initial={{ opacity: 0, x: -20 }}
                animate={{ opacity: 1, x: 0 }}
                className="text-4xl font-bold text-white mb-2"
              >
                Bienvenue, <span className="text-primary">Gordo !</span>
              </motion.h2>
              <p className="text-slate-400 text-lg">Qu'est-ce qu'on va résoudre aujourd'hui ?</p>
            </div>
            <button className="flex items-center gap-2 px-6 py-3 bg-primary hover:bg-primary-hover text-white font-bold rounded-xl transition-all shadow-lg shadow-primary/25 hover:shadow-primary/40 neon-button uppercase tracking-wider text-sm">
              <Plus size={20} />
              Poser une Question
            </button>
          </div>

          {/* Stats Grid */}
          <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
            {[
              { label: 'Total Questions', value: '124', color: 'primary' },
              { label: 'Réponses Données', value: '42', color: 'accent' },
              { label: 'Experts en ligne', value: '18', color: 'indigo' },
            ].map(stat => (
              <GlassCard key={stat.label} className="flex items-center gap-6 p-8 relative overflow-hidden group">
                <div className={`w-2 h-12 rounded-full bg-${stat.color === 'primary' ? 'indigo-500' : stat.color === 'accent' ? 'emerald-500' : 'blue-500'}`}></div>
                <div>
                  <p className="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1">{stat.label}</p>
                  <p className="text-3xl font-black text-white">{stat.value}</p>
                </div>
                <ChevronRight className="absolute right-6 opacity-0 group-hover:opacity-100 group-hover:translate-x-2 transition-all text-slate-600" />
              </GlassCard>
            ))}
          </div>

          {/* Feed */}
          <div className="space-y-6">
            <div className="flex items-center gap-4 mb-4">
              <h3 className="text-xl font-bold text-white">Nouveautés</h3>
              <div className="h-px flex-1 bg-white/5"></div>
            </div>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
              {questions.map(q => (
                <QuestionCard
                  key={q.id}
                  title={q.title}
                  author={q.author}
                  date={q.date}
                  answers={q.answers}
                  votes={q.votes}
                />
              ))}
            </div>
          </div>
        </section>
      </main>
    </div>
  );
}

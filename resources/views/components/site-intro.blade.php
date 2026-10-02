<div id="talisha-intro" class="fixed inset-0 z-[9999] bg-[#050505] flex flex-col items-center justify-center overflow-hidden">
  <!-- Central Sunset Amber Light -->
  <div class="absolute inset-0 flex items-center justify-center pointer-events-none overflow-hidden">
    <!-- Layer 1: Broad soft ambient base -->
    <div id="intro-glow" class="absolute w-[600px] h-[500px] rounded-[50%] opacity-0" 
         style="background: radial-gradient(ellipse at center, rgba(220, 140, 40, 0.25) 0%, rgba(180, 95, 20, 0.15) 30%, rgba(120, 60, 10, 0.05) 50%, transparent 70%); filter: blur(50px);"></div>
    <!-- Layer 2: Core intense amber directly behind logo -->
    <div id="intro-glow-core" class="absolute w-[350px] h-[300px] rounded-[50%] opacity-0 -translate-y-8" 
         style="background: radial-gradient(ellipse at center, rgba(255, 140, 0, 0.4) 0%, rgba(200, 100, 0, 0.2) 40%, transparent 70%); filter: blur(40px);"></div>
  </div>

  <!-- Content Container -->
  <div class="relative z-10 flex flex-col items-center w-full px-4">
    
    <!-- Logo -->
    <div id="intro-logo" class="opacity-0 translate-y-4 mb-8 flex flex-col items-center">
       <img src="{{ asset('img/talisha software logo.png') }}" alt="Talisha Software" class="h-20 md:h-28 object-contain filter drop-shadow-[0_0_15px_rgba(255,122,0,0.3)]">
    </div>

    <!-- Main Tagline -->
    <div id="intro-tagline-1" class="opacity-0 mb-3 mt-2 text-center">
      <h2 class="text-gray-200 tracking-[0.25em] text-[10px] md:text-sm font-light uppercase">POWERING INTELLIGENT <span class="text-[#d99a38]">DIGITAL INNOVATION</span></h2>
    </div>

    <!-- Secondary Description -->
    <div id="intro-tagline-2" class="opacity-0 mb-16 text-center">
      <p class="text-gray-500 text-[10px] md:text-xs tracking-wider">Enterprise Software &middot; AI Solutions &middot; Cloud Computing</p>
    </div>

    <!-- Progress Container -->
    <div id="intro-progress-container" class="opacity-0 w-[220px] md:w-[300px] flex flex-col items-center">
      <div class="w-full h-[1px] bg-gray-800 overflow-hidden mb-4 relative">
         <div id="intro-progress-bar" class="h-full bg-accent-orange w-0 relative" style="box-shadow: 0 0 8px rgba(255,122,0,0.6);"></div>
      </div>
      <div class="text-accent-orange font-mono text-[10px] md:text-xs tracking-wider" id="intro-progress-text">0%</div>
    </div>

  </div>

  <!-- Bottom Values -->
  <div id="intro-values" class="absolute bottom-12 md:bottom-16 opacity-0 flex flex-wrap justify-center gap-6 md:gap-12 text-[9px] md:text-[10px] text-gray-500 tracking-[0.4em] uppercase w-full px-4 text-center">
    <span>INNOVATION</span>
    <span>EXCELLENCE</span>
    <span>INTEGRITY</span>
    <span>IMPACT</span>
  </div>
</div>



<x-layout.app>

{{-- ══════════════════════════════════════════════════════════
     TALISHA SOFTWARE — PREMIUM HOMEPAGE
     Visual identity: Original Talisha + Premium Modernisation
     Black / White alternating sections + Orange accent system
     ══════════════════════════════════════════════════════════ --}}

{{-- ─── GLOBAL PAGE STYLES ─────────────────────────────────── --}}
@push('styles')
<style>
/* ── Fonts ── */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* ── Reset helpers ── */
*, *::before, *::after { box-sizing: border-box; }

/* ── Keyframes ── */
@keyframes ts-marquee   { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
@keyframes ts-pulse     { 0%,100%{opacity:.4;transform:scale(1)} 50%{opacity:.9;transform:scale(1.04)} }
@keyframes ts-pl-bar    { from{width:0%} to{width:100%} }
@keyframes ts-fadein    { from{opacity:0;transform:translateY(18px)} to{opacity:1;transform:translateY(0)} }
@keyframes ts-spin-slow { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
@keyframes ts-count     { from{opacity:0;transform:translateY(10px)} to{opacity:1;transform:translateY(0)} }

/* ── Reveal utility (safe – content visible by default) ── */
.ts-rv {
  opacity: 1;
  transform: translateY(0);
  transition: opacity .7s ease, transform .7s ease;
}
.ts-rv.ts-hidden {
  opacity: 0;
  transform: translateY(28px);
}

/* ── Dot texture ── */
.ts-dots {
  background-image: radial-gradient(rgba(255,140,0,.32) 1px, transparent 1px);
  background-size: 10px 10px;
}

/* ── 2×2 square motif ── */
.ts-motif {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 4px;
  width: 38px;
  height: 38px;
}
.ts-motif span {
  display: block;
  border-radius: 2px;
  background: #e0e0e0;
}
.ts-motif span.ts-orange { background: #FF7A00; }

/* ── Partner marquee ── */
.ts-track-wrap { overflow: hidden; position: relative; }
.ts-track {
  display: flex;
  width: max-content;
  animation: ts-marquee 32s linear infinite;
  gap: 80px;
  align-items: center;
}
.ts-track:hover { animation-play-state: paused; }
.ts-track img {
  height: 48px;
  width: auto;
  max-width: 160px;
  object-fit: contain;
  filter: brightness(0) invert(1);
  opacity: .65;
  flex-shrink: 0;
  transition: opacity .35s ease, filter .35s ease;
}
.ts-track img:hover { opacity: 1; filter: brightness(0) invert(1) drop-shadow(0 0 8px rgba(255,160,0,.5)); }

/* ── Service card ── */
.ts-svc-card {
  background: #000;
  border-radius: 22px;
  padding: 40px;
  min-height: 220px;
  position: relative;
  cursor: pointer;
  transition: transform .35s ease, box-shadow .35s ease;
}
.ts-svc-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 18px 48px rgba(0,0,0,.55), 0 0 30px rgba(255,122,0,.1);
}
.ts-svc-card .ts-arrow {
  position: absolute;
  bottom: 28px; right: 28px;
  width: 20px; height: 20px;
  border-right: 2px solid #fff;
  border-bottom: 2px solid #fff;
  transform: rotate(-45deg);
  transition: transform .3s ease;
}
.ts-svc-card:hover .ts-arrow {
  transform: rotate(-45deg) translate(5px, 5px);
}

/* ── Tech card ── */
.ts-tech-card {
  border: 2px solid #FF7A00;
  border-radius: 20px;
  padding: 32px 36px;
  transition: background .3s ease, transform .3s ease;
  cursor: pointer;
}
.ts-tech-card:hover { background: #111; transform: translateY(-5px); }

/* ── Why Talisha item ── */
.ts-why-item { display: flex; gap: 16px; align-items: flex-start; }
.ts-why-num { font-size: 28px; font-weight: 700; color: #fff; min-width: 48px; flex-shrink: 0; }
.ts-why-txt { font-size: 18px; color: #fff; line-height: 1.45; }

/* ── Industry card ── */
.ts-ind-item { margin-bottom: 32px; }
.ts-ind-item:last-child { margin-bottom: 0; }
.ts-ind-item h3 { font-size: 20px; font-weight: 600; color: #000; margin-bottom: 5px; }
.ts-ind-item p  { font-size: 14px; color: #444; line-height: 1.5; }

/* ── Hero search bar ── */
.ts-search {
  display: flex;
  align-items: center;
  gap: 12px;
  border: 2px solid rgba(255,255,255,.45);
  border-radius: 60px;
  background: rgba(0,0,0,.35);
  backdrop-filter: blur(14px);
  padding: 0 28px;
  height: 64px;
  transition: border-color .3s ease, box-shadow .3s ease;
}
.ts-search:hover,
.ts-search:focus-within {
  border-color: #FF7A00;
  box-shadow: 0 0 28px rgba(255,122,0,.45);
}
.ts-search input {
  flex: 1; background: transparent; border: 0; outline: 0;
  color: #fff; font-size: 16px; font-family: inherit;
}
.ts-search input::placeholder { color: rgba(255,255,255,.45); }

/* ── CTA buttons ── */
.ts-btn-primary {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 15px 30px; border-radius: 12px;
  background: #FF3B30; color: #fff; font-weight: 600;
  font-size: 15px; text-decoration: none;
  transition: background .3s ease, transform .3s ease;
}
.ts-btn-primary:hover { background: #E8221A; transform: translateY(-3px); }

.ts-btn-outline {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 14px 28px; border-radius: 12px;
  border: 2px solid rgba(255,255,255,.55); color: #fff;
  font-size: 14px; text-decoration: none;
  transition: background .3s ease, transform .3s ease;
}
.ts-btn-outline:hover { background: rgba(255,255,255,.08); transform: translateY(-3px); }

.ts-btn-store {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 14px 28px; border-radius: 12px;
  border: 2px solid #FF7A00; color: #fff;
  font-size: 14px; text-decoration: none;
  transition: box-shadow .3s ease, transform .3s ease;
}
.ts-btn-store:hover { box-shadow: 0 0 22px rgba(255,122,0,.7); transform: translateY(-3px); }

/* ── Mobile responsive ── */
@media (max-width: 768px) {
  .ts-track { gap: 48px; animation-duration: 22s; }
  .ts-track img { height: 36px; }
  .ts-search { height: 54px; padding: 0 20px; }
  .ts-svc-card { padding: 30px 24px; }
  .ts-tech-card { padding: 24px; }
  .ts-why-num { font-size: 22px; min-width: 38px; }
  .ts-why-txt { font-size: 15px; }
  .ts-motif { width: 28px; height: 28px; gap: 3px; }
}

@media (max-width: 480px) {
  .ts-track { gap: 32px; animation-duration: 18s; }
  .ts-track img { height: 28px; }
}


</style>
@endpush



{{-- ════════════════════════════════════════════════════════
     1 ▸ HERO — Black + Sunset Orange Glow
     ════════════════════════════════════════════════════════ --}}
<section class="relative min-h-screen flex flex-col -mt-20 overflow-hidden"
         style="font-family:'Poppins',sans-serif; background: #080808;">

  {{-- Sunset orange glow — large atmospheric radial --}}
  <div class="absolute inset-0 pointer-events-none" style="
    background:
      radial-gradient(ellipse 120% 65% at 50% 108%,  rgba(255,140,0,.92)  0%,
                                                      rgba(255,100,0,.72) 18%,
                                                      rgba(200,60,0,.42)  34%,
                                                      rgba(30,10,0,.12)   52%,
                                                      transparent          68%),
      radial-gradient(ellipse 80% 45% at 30% 110%,   rgba(255,180,0,.35)  0%,
                                                      transparent          55%),
      radial-gradient(ellipse 80% 45% at 70% 110%,   rgba(255,100,0,.3)   0%,
                                                      transparent          55%);
  "></div>

  {{-- Dot texture overlay --}}
  <div class="absolute inset-0 pointer-events-none ts-dots" style="opacity:.18;"></div>

  {{-- 2×2 motif — top right --}}
  <div class="absolute top-32 right-10 md:top-40 md:right-14 ts-motif z-20">
    <span></span><span></span>
    <span class="ts-orange"></span><span></span>
  </div>

  {{-- AI Intelligence Core Canvas --}}
  <canvas id="ts-ai-core" class="absolute top-[25%] lg:top-[10%] right-0 lg:right-[2%] w-full h-[60%] lg:w-[45%] lg:h-[80%] z-10 pointer-events-none opacity-30 lg:opacity-100" aria-hidden="true"></canvas>

  {{-- Content layer --}}
  <div class="relative z-20 flex flex-col h-full min-h-screen px-6 sm:px-10 md:px-16 lg:px-20 pt-28 pb-16">

    {{-- Top tagline --}}
    <p class="text-xs sm:text-sm text-white/70 mb-10 tracking-wider">
      Revolutionizing Digital Experiences, Ownership &amp; Innovation
    </p>

    {{-- Logo wordmark --}}
    <div class="mb-8">
      <img src="/img/talisha software logo.png"
           onerror="this.onerror=null;this.replaceWith(Object.assign(document.createElement('span'),{className:'text-4xl font-bold text-white',innerHTML:'Talisha<span style=color:#FF7A00>.</span>software'}))"
           alt="Talisha Software"
           class="h-14 md:h-16 lg:h-20 w-auto object-contain"
           style="filter:brightness(0) invert(1);">
    </div>

    {{-- Main heading --}}
    <h1 class="font-semibold text-white max-w-3xl mb-6 leading-tight"
        style="font-size:clamp(2.1rem,5.5vw,4rem);">
      Redefining Business Through<br>
      <span style="color:#FF7A00;">Artificial Intelligence</span>
    </h1>

    {{-- Search bar --}}
    <form action="{{ route('search.index') }}" method="GET" class="ts-search max-w-lg mb-12"
          x-data="{
              isListening: false,
              query: '',
              startSpeech() {
                  const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                  if (!SpeechRecognition) {
                      alert('Voice search is not supported in this browser.');
                      return;
                  }
                  
                  const recognition = new SpeechRecognition();
                  recognition.lang = 'en-US';
                  recognition.interimResults = false;
                  recognition.maxAlternatives = 1;

                  recognition.onstart = () => {
                      this.isListening = true;
                  };

                  recognition.onresult = (event) => {
                      this.query = event.results[0][0].transcript;
                      setTimeout(() => { $el.submit(); }, 300);
                  };

                  recognition.onerror = (event) => {
                      this.isListening = false;
                      console.error('Speech recognition error', event.error);
                  };

                  recognition.onend = () => {
                      this.isListening = false;
                  };

                  recognition.start();
              }
          }">
      <button type="submit" aria-label="Search" class="flex items-center justify-center focus:outline-none bg-transparent border-none p-0 cursor-pointer">
        <svg width="20" height="20" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><line x1="16.5" y1="16.5" x2="21" y2="21"/></svg>
      </button>
      <input type="text" name="q" x-model="query" placeholder="Search..." aria-label="Search Talisha Software" class="bg-transparent border-none outline-none text-white w-full">
      <button type="button" @click="startSpeech" :class="isListening ? 'text-accent-orange animate-pulse' : 'text-gray-400 hover:text-white'" aria-label="Voice Search" style="border-left:1px solid rgba(255,255,255,.3);padding-left:10px;cursor:pointer;background:transparent;border-top:none;border-right:none;border-bottom:none;" class="flex items-center justify-center focus:outline-none transition-colors h-full">
        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3a3 3 0 0 1 3 3v5a3 3 0 0 1-6 0V6a3 3 0 0 1 3-3z"/><line x1="12" y1="17" x2="12" y2="21"/><line x1="8" y1="21" x2="16" y2="21"/></svg>
      </button>
    </form>

    {{-- CTA buttons --}}
    <div class="flex flex-wrap gap-4">
      <a href="{{ route('contact.index') }}" class="ts-btn-primary">GET STARTED &rarr;</a>
      <a href="{{ route('about') }}" class="ts-btn-outline">Let's Build the Future — Starting Today&rarr;</a>
      <a href="#" class="ts-btn-store">Soon on the UAE &rarr;</a>
      <a href="#" class="ts-btn-store">Soon on Google Play &rarr;</a>
    </div>

  </div>
</section>

{{-- ════════════════════════════════════════════════════════
     2 ▸ OUR PARTNERS — Black section
     ════════════════════════════════════════════════════════ --}}
<section style="background:#0A0A0A; padding:96px 0; position:relative; overflow:hidden; font-family:'Poppins',sans-serif;">
  <div class="absolute top-0 inset-x-0 h-px" style="background:linear-gradient(90deg,transparent,rgba(255,255,255,.12),transparent);"></div>

  <div class="max-w-6xl mx-auto px-6 lg:px-8">
    {{-- Header --}}
    <div class="text-center mb-16 ts-rv">
      <span class="block mb-4 text-xs font-semibold tracking-[.22em] uppercase" style="color:#777;">OUR PARTNERS</span>
      <h2 class="text-white font-light" style="font-size:clamp(1.4rem,3.5vw,2.2rem);max-width:700px;margin:0 auto;line-height:1.5;">
        Trusted by <span class="font-semibold text-white">Industry Leaders</span>
        &amp; Growing <span class="font-semibold text-white">Enterprises</span>
      </h2>
    </div>

    {{-- Logo marquee --}}
    <div class="ts-track-wrap mb-16">
      {{-- Fade edges --}}
      <div class="absolute inset-y-0 left-0 w-20 md:w-32 z-10 pointer-events-none"
           style="background:linear-gradient(90deg,#0A0A0A,transparent);"></div>
      <div class="absolute inset-y-0 right-0 w-20 md:w-32 z-10 pointer-events-none"
           style="background:linear-gradient(270deg,#0A0A0A,transparent);"></div>

      {{-- Track — logos duplicated ×3 for seamless loop --}}
      <div class="ts-track" aria-hidden="true">
        @php
          $logoFiles = [
            ['file'=>'skc logo.png',               'alt'=>'SKC The Solution Providers'],
            ['file'=>'printdoro logo.png',          'alt'=>'Printdoro'],
            ['file'=>'rotary.png',                  'alt'=>'Rotary International'],
            ['file'=>'talisha aerospace logo.png',  'alt'=>'Talisha Aerospace'],
          ];
          $allLogos = array_merge($logoFiles, $logoFiles, $logoFiles);
        @endphp
        @foreach($allLogos as $logo)
          <img src="/img/{{ $logo['file'] }}" alt="{{ $logo['alt'] }}"
               onerror="this.style.display='none'" loading="lazy">
        @endforeach
      </div>
    </div>

    {{-- Statistics --}}
    <div class="grid grid-cols-3 gap-4 max-w-xl mx-auto ts-rv">
      @php
        $stats = [
          ['num'=>'50+', 'label'=>'CLIENTS'],
          ['num'=>'2+',  'label'=>'COUNTRIES'],
          ['num'=>'2+',  'label'=>'YEARS EXCELLENCE'],
        ];
      @endphp
      @foreach($stats as $i => $stat)
      <div class="text-center{{ $i===1 ? ' border-x' : '' }}"
           style="{{ $i===1 ? 'border-color:rgba(255,255,255,.12)' : '' }}">
        <div class="font-bold text-white ts-stat-num" style="font-size:clamp(2rem,5vw,3.2rem);">
          {{ $stat['num'] }}
        </div>
        <div style="font-size:11px;letter-spacing:.18em;color:#777;margin-top:6px;font-weight:600;">
          {{ $stat['label'] }}
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="absolute bottom-0 inset-x-0 h-px" style="background:linear-gradient(90deg,transparent,rgba(255,255,255,.1),transparent);"></div>
</section>

{{-- ════════════════════════════════════════════════════════
     3 ▸ INTRODUCTION — White section with orange geo art
     ════════════════════════════════════════════════════════ --}}
<section style="background:#f4f4f4; position:relative; overflow:hidden; padding:120px 0; font-family:'Poppins',sans-serif;">

  {{-- Flowing Intelligence / Digital Energy Canvas --}}
  <canvas id="ts-mission-canvas" class="absolute inset-0 w-full h-full pointer-events-none z-0" aria-hidden="true"></canvas>

  <div class="max-w-[1300px] mx-auto px-6 md:px-12 lg:px-16 relative z-10">
    <div class="flex flex-col lg:flex-row justify-between items-start gap-16">

      {{-- Left --}}
      <div class="lg:max-w-[540px] ts-rv">
        <p class="mb-8 font-medium" style="font-size:22px;color:#555;">Introduction</p>
        <h2 class="font-bold leading-tight mb-10"
            style="font-size:clamp(2.8rem,6vw,4.5rem);color:#222;line-height:1.05;">
          Welcome to<br>the Intelligent<br>Digital Era
        </h2>
        <div class="flex flex-col sm:flex-row gap-8">
          <p style="font-size:18px;color:#444;line-height:1.65;flex:1;">
            The digital world<br>is evolving faster<br>than ever.
          </p>
          <p style="font-size:18px;color:#444;line-height:1.65;flex:1;">
            Build smarter systems.<br>Deliver faster outcomes.<br>Create lasting impact.
          </p>
        </div>
      </div>

      {{-- Right --}}
      <div class="lg:max-w-[380px] ts-rv" style="transition-delay:.12s;">
        <h3 class="font-bold mb-5" style="font-size:clamp(1.8rem,4vw,2.8rem);color:#222;">Our mission</h3>
        <p style="font-size:18px;color:#555;line-height:1.65;">
          To empower organizations with AI-driven systems that automate complexity, unlock insights,
          and accelerate innovation in a rapidly transforming global economy.
        </p>
        <a href="{{ route('about') }}" class="inline-flex items-center gap-2 mt-8 font-semibold transition-all"
           style="color:#FF7A00; font-size:16px;">
          Learn more about us
          <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
      </div>

    </div>
  </div>
</section>

{{-- ════════════════════════════════════════════════════════
     4 ▸ AI SOLUTIONS LIST — Black interactive section
     ════════════════════════════════════════════════════════ --}}
<section style="background:#000;color:#fff;padding:112px 0;font-family:'Poppins',sans-serif;">
  <div class="max-w-[1300px] mx-auto px-6 md:px-12 lg:px-16">
    <div class="flex flex-col lg:flex-row gap-16 items-start">

      {{-- Left: interactive list --}}
      <div class="lg:flex-1">
        @php
          $aiItems = [
            ['title'=>'AI Product Development',
             'desc' =>'Design and deploy intelligent AI systems, chatbots, automation tools, and predictive platforms tailored to your business goals.'],
            ['title'=>'Web3 &amp; Blockchain Engineering',
             'desc' =>'Build secure smart contracts, decentralised applications (dApps), and scalable blockchain infrastructures for the next-generation web.'],
            ['title'=>'Enterprise Digital Transformation',
             'desc' =>'Modernise your operations with cloud-native systems, data engineering, and intelligent automation for long-term competitive advantage.'],
          ];
        @endphp
        @foreach($aiItems as $idx => $item)
        <div class="ts-ai-row ts-rv py-8 cursor-pointer"
             data-idx="{{ $idx }}"
             style="border-bottom:1px solid rgba(255,255,255,.1);opacity:{{ $idx===0?'1':'0.5' }};
                    border-bottom-color:{{ $idx===0?'#fff':'rgba(255,255,255,.1)' }};
                    transition:opacity .4s ease,border-color .4s ease;">
          <h3 style="font-size:clamp(1.2rem,2.5vw,1.7rem);font-weight:600;margin-bottom:10px;">{!! $item['title'] !!}</h3>
          <p style="font-size:15px;color:#aaa;line-height:1.6;">{!! $item['desc'] !!}</p>
        </div>
        @endforeach
      </div>

      {{-- Right: display panel --}}
      <div id="ts-service-panel" class="lg:flex-1 rounded-2xl flex items-center justify-center relative overflow-hidden"
           style="background:#0D0D0D;border:1px solid rgba(255,255,255,.07);min-height:400px;transition:box-shadow .4s ease, border-color .4s ease;">
        {{-- AI Data Flow / Neural Network Canvas --}}
        <canvas id="ts-service-network" class="absolute inset-0 w-full h-full z-0 pointer-events-none" aria-hidden="true"></canvas>
        <div class="relative z-10 text-center px-10">
          <div id="ts-panel-title" class="font-bold text-white mb-3"
               style="font-size:clamp(1.2rem,2.5vw,1.6rem);">AI Product Development</div>
          <div id="ts-panel-desc" class="text-sm text-gray-400 leading-relaxed max-w-xs mx-auto">
            Intelligent systems designed for real-world enterprise impact
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ════════════════════════════════════════════════════════
     5 ▸ OUR SERVICES — Black + Grey card grid
     ════════════════════════════════════════════════════════ --}}
<section style="background:#000;padding:96px 0;font-family:'Poppins',sans-serif;">
  <div class="max-w-[1200px] mx-auto px-6 lg:px-8">

    {{-- Header --}}
    <div class="mb-16 ts-rv">
      <p class="text-right text-sm mb-5" style="color:#bdbdbd;">
        Unlock the Future with Talisha Software &amp; Emerging Technologies
      </p>
      <h2 class="font-bold mb-3" style="font-size:clamp(2.5rem,6vw,4rem);color:#FF7A00;">Our Services</h2>
      <p style="font-size:clamp(1.1rem,2.5vw,1.6rem);color:#e0e0e0;">
        End-to-End Blockchain &amp; Web3 Solutions
      </p>
    </div>

    {{-- Cards wrapper — grey bg, orange top border --}}
    <div class="rounded-[22px] p-8 md:p-14" style="background:#dcdcdc;border-top:3px solid #FF7A00;">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
          $svcs = [
            ['AI &amp; Intelligent Automation',             'Build systems that think, learn, and adapt.'],
            ['Smart Infrastructure &amp; Digital Platforms','End-to-end hardware + software ecosystems.'],
            ['Industrial IoT &amp; Embedded Solutions',     'Hardware innovation backed by scalable software infrastructure.'],
            ['AI Product Development',                      'Design and deploy intelligent AI systems and predictive platforms.'],
            ['Web3 &amp; Blockchain Engineering',           'Smart contracts, dApps, and decentralised blockchain infrastructure.'],
            ['Enterprise Digital Transformation',           'Cloud-native systems, data engineering, and intelligent automation.'],
          ];
        @endphp
        @foreach($svcs as $svc)
        <a href="{{ route('services.index') }}" class="ts-svc-card ts-rv">
          <h3 class="text-white font-semibold mb-4 leading-snug"
              style="font-size:clamp(1rem,2vw,1.4rem);">{!! $svc[0] !!}</h3>
          <p style="font-size:14px;color:#d4d4d4;line-height:1.55;">{!! $svc[1] !!}</p>
          <span class="ts-arrow"></span>
        </a>
        @endforeach
      </div>
    </div>

  </div>
</section>

{{-- ════════════════════════════════════════════════════════
     6 ▸ EMERGING TECH — Black, orange-border cards
     ════════════════════════════════════════════════════════ --}}
<section style="background:#000;color:#fff;padding:96px 0;position:relative;overflow:hidden;font-family:'Poppins',sans-serif;">

  {{-- Dot pattern — right side --}}
  <div class="absolute top-0 right-0 w-64 h-full ts-dots pointer-events-none"
       style="opacity:.38;mask-image:linear-gradient(to left,black,transparent);-webkit-mask-image:linear-gradient(to left,black,transparent);"></div>

  {{-- Orange circle arrow button --}}
  <div class="absolute right-10 top-1/2 -translate-y-1/2 hidden lg:flex items-center justify-center rounded-full cursor-pointer z-10"
       style="width:54px;height:54px;background:#FF7A00;transition:all .25s ease;"
       onmouseenter="this.style.transform='translateY(-50%) scale(1.1)';this.style.boxShadow='0 0 22px rgba(255,122,0,.8)'"
       onmouseleave="this.style.transform='translateY(-50%) scale(1)';this.style.boxShadow='none'"
       aria-hidden="true">
    <svg width="14" height="14" fill="none" viewBox="0 0 24 24">
      <path d="M5 12h14M12 5l7 7-7 7" stroke="#000" stroke-width="2.5" stroke-linecap="round"/>
    </svg>
  </div>

  <div class="max-w-[1200px] mx-auto px-6 lg:px-8 relative z-10">

    {{-- Top bar --}}
    <div class="flex justify-between items-center text-sm mb-10" style="color:#bdbdbd;">
      <span class="hidden md:block">Talisha Software</span>
      <span class="flex-1 text-center">Unlock the Future with Talisha Software &amp; Emerging Technologies</span>
      <span class="font-medium">2026</span>
    </div>

    <h2 class="font-bold leading-none mb-16 ts-rv"
        style="font-size:clamp(3rem,8vw,5.5rem);">
      Emerging Tech<br>We Integrate
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-14">
      @php
        $techs = [
          ['AI &amp; Machine Learning',  'Smarter decision-making'],
          ['IoT &amp; Edge Computing',   'Real-time data at the edge'],
          ['AR/VR &amp; Metaverse',      'Immersive digital experiences'],
          ['Cloud &amp; DevOps',         'Scalable infrastructure for growth'],
        ];
      @endphp
      @foreach($techs as $t)
      <div class="ts-tech-card ts-rv">
        <h3 class="text-white font-semibold mb-2"
            style="font-size:clamp(1.1rem,2.2vw,1.4rem);">{!! $t[0] !!}</h3>
        <p style="color:#cfcfcf;font-size:15px;">{!! $t[1] !!}</p>
      </div>
      @endforeach
    </div>

    <p class="font-light ts-rv" style="font-size:clamp(1.3rem,3vw,1.8rem);">Tech Powering the Future</p>

  </div>
</section>

{{-- ════════════════════════════════════════════════════════
     7 ▸ WHY CHOOSE TALISHA — Near-black + Orange box
     ════════════════════════════════════════════════════════ --}}
<section style="background:#090800;color:#fff;padding:96px 0;position:relative;overflow:hidden;font-family:'Poppins',sans-serif;">

  {{-- Dot patterns --}}
  <div class="absolute bottom-0 left-0 w-56 h-56 ts-dots pointer-events-none"
       style="opacity:.38;mask-image:linear-gradient(to top,black,transparent);-webkit-mask-image:linear-gradient(to top,black,transparent);"></div>
  <div class="absolute top-0 right-0 w-72 h-72 ts-dots pointer-events-none"
       style="opacity:.38;mask-image:linear-gradient(to left,black,transparent);-webkit-mask-image:linear-gradient(to left,black,transparent);"></div>

  <div class="max-w-[1300px] mx-auto px-6 lg:px-8 relative z-10">

    {{-- Top info bar --}}
    <div class="flex justify-end items-center gap-12 text-sm mb-10" style="color:#aaa;">
      <span>Engineering Intelligent Hardware &amp; Software Solutions</span>
      <span class="font-medium">2026</span>
    </div>

    <div class="flex flex-col lg:flex-row gap-8 items-stretch">

      {{-- Left — orange-bordered box --}}
      <div class="lg:flex-1 rounded-[2.5rem] p-10 md:p-16 ts-rv"
           style="border:2px solid #FF7A00;">
        <p class="mb-8 text-lg font-medium" style="color:#bbb;">Why Choose Talisha Software</p>
        <h2 class="font-bold leading-tight text-white"
            style="font-size:clamp(2.8rem,6vw,4.5rem);">
          Your<br>Intelligent<br>Technology<br>Partner
        </h2>
      </div>

      {{-- Right — orange bg, 2×2 grid --}}
      <div class="lg:flex-1 rounded-[2rem] p-10 md:p-14 ts-rv"
           style="background:#FF7A00; transition-delay:.1s;">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
          @php
            $reasons = [
              'AI-driven hardware &amp; software integration expertise',
              'End-to-end smart system development from device to cloud',
              'Scalable infrastructure built for Industry 4.0',
              'Security-first architecture with real-time intelligence',
              'Future-ready innovation powered by AI &amp; IoT',
            ];
          @endphp
          @foreach($reasons as $i => $r)
          <div class="ts-why-item{{ $i===4 ? ' sm:col-span-2' : '' }}">
            <span class="ts-why-num">{{ str_pad($i+1,2,'0',STR_PAD_LEFT) }}</span>
            <p class="ts-why-txt">{!! $r !!}</p>
          </div>
          @endforeach
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ════════════════════════════════════════════════════════
     8 ▸ INDUSTRY APPLICATIONS — White editorial section
     ════════════════════════════════════════════════════════ --}}
<section style="background:#fff;position:relative;overflow:hidden;padding:96px 0 0 0;font-family:'Poppins',sans-serif;">

  {{-- Dot texture — top right --}}
  <div class="absolute top-0 right-0 w-[420px] h-[420px] ts-dots pointer-events-none"
       style="opacity:.45;mask-image:linear-gradient(to left,black 40%,transparent 100%);-webkit-mask-image:linear-gradient(to left,black 40%,transparent 100%);"></div>

  {{-- Dot texture — bottom left --}}
  <div class="absolute bottom-[160px] left-0 w-[280px] h-[280px] ts-dots pointer-events-none"
       style="opacity:.3;mask-image:linear-gradient(to right,black,transparent);-webkit-mask-image:linear-gradient(to right,black,transparent);"></div>

  <p class="text-center text-sm mb-14 px-4 relative z-10" style="color:#222;">
    Delivering Intelligent Solutions Across Industries
  </p>

  <div class="max-w-[1300px] mx-auto px-6 lg:px-8 relative z-10">

    <div class="flex flex-col lg:flex-row justify-between items-start gap-16 mb-0">

      {{-- Left heading --}}
      <div class="ts-rv lg:w-[420px] xl:w-[480px] shrink-0">
        <p class="font-medium mb-4" style="font-size:20px;color:#111;">Industry Applications</p>
        <h2 class="font-bold leading-tight" style="font-size:clamp(2.4rem,5.5vw,4rem);color:#000;">
          Transforming<br>Industries with<br>Smart Technology
        </h2>
      </div>

      {{-- Right: two editorial columns --}}
      <div class="flex flex-col sm:flex-row gap-8 lg:flex-1">

        <div class="flex-1 p-10 ts-rv" style="border:2px solid #2a2a2a;transition-delay:.08s;">
          @php
            $iLeft = [
              ['Financial Technology',         'AI-driven analytics, secure transaction systems, and intelligent risk management platforms.'],
              ['Manufacturing &amp; Industry 4.0','IoT-enabled automation, predictive maintenance, and smart production monitoring systems.'],
              ['Healthcare Technology',        'Secure data systems, AI-powered diagnostics support, and connected medical device integration.'],
              ['Smart Infrastructure',         'Integrated hardware-software ecosystems for real-time monitoring and operational efficiency.'],
            ];
          @endphp
          @foreach($iLeft as $ind)
          <div class="ts-ind-item">
            <h3>{!! $ind[0] !!}</h3>
            <p>{!! $ind[1] !!}</p>
          </div>
          @endforeach
        </div>

        <div class="flex-1 p-10 ts-rv" style="border:2px solid #2a2a2a;transition-delay:.14s;">
          @php
            $iRight = [
              ['E-Commerce &amp; Retail',  'Intelligent recommendation engines, automated inventory systems, and scalable digital platforms.'],
              ['Enterprise Automation',    'Custom AI solutions designed to streamline workflows and enhance business productivity.'],
              ['Energy &amp; Utilities',   'Smart grid integration, IoT-enabled monitoring, and data-driven optimisation systems.'],
            ];
          @endphp
          @foreach($iRight as $ind)
          <div class="ts-ind-item">
            <h3>{!! $ind[0] !!}</h3>
            <p>{!! $ind[1] !!}</p>
          </div>
          @endforeach
        </div>

      </div>
    </div>

  </div>

  {{-- Orange gradient bottom strip --}}
  <div class="relative mt-16" style="height:160px;border-top:2px solid #2a2a2a;
    background:linear-gradient(to top,#FE9D00 0%,rgba(230,150,22,.85) 40%,transparent 100%);">
    <a href="{{ route('industries.index') }}"
       class="absolute right-10 md:right-16 top-1/2 -translate-y-1/2 flex items-center justify-center rounded-full transition-all duration-300"
       style="width:54px;height:54px;background:#000;"
       onmouseenter="this.style.background='#FF7A00'"
       onmouseleave="this.style.background='#000'"
       aria-label="View all industries">
      <svg width="14" height="14" fill="none" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7" stroke="#fff" stroke-width="2.5" stroke-linecap="round"/>
      </svg>
    </a>
  </div>

</section>

{{-- ════════════════════════════════════════════════════════
     9 ▸ GET IN TOUCH — Black + Orange, full viewport
     ════════════════════════════════════════════════════════ --}}
<section style="background:#050505;color:#fff;min-height:100vh;position:relative;overflow:hidden;font-family:'Poppins',sans-serif;">

  {{-- Dot pattern --}}
  <div class="absolute inset-0 ts-dots pointer-events-none" style="opacity:.12;"></div>

  {{-- Sunset atmospheric glow — left side --}}
  <style>
    @keyframes ts-sunset-breathe {
      0%, 100% { opacity: 0.85; }
      50% { opacity: 1; }
    }
    @media (prefers-reduced-motion: reduce) {
      .ts-sunset-anim { animation: none !important; opacity: 1 !important; }
    }
  </style>
  <div class="ts-sunset-anim absolute inset-0 pointer-events-none z-0" aria-hidden="true"
       style="animation: ts-sunset-breathe 8s ease-in-out infinite; background: 
         radial-gradient(ellipse 40% 80% at -5% 45%, rgba(255, 180, 0, 0.95) 0%, rgba(255, 90, 0, 0.5) 35%, transparent 70%),
         radial-gradient(ellipse 75% 130% at 0% 45%, rgba(255, 140, 0, 0.85) 0%, rgba(255, 70, 0, 0.65) 20%, rgba(180, 40, 0, 0.4) 35%, rgba(90, 15, 0, 0.15) 55%, transparent 75%),
         radial-gradient(ellipse 50% 50% at 30% 55%, rgba(255, 100, 0, 0.07) 0%, transparent 60%);">
  </div>

  {{-- 2×2 motif top right --}}
  <div class="absolute top-10 right-10 ts-motif opacity-40">
    <span></span><span></span>
    <span class="ts-orange"></span><span></span>
  </div>

  <div class="max-w-[1300px] mx-auto px-8 md:px-14 lg:px-16 h-full min-h-screen flex flex-col justify-between py-14 relative z-10">

    {{-- Top row --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
      <p style="font-size:15px;color:#e5e5e5;">
        Revolutionizing Digital Experiences, Ownership &amp; Innovation
      </p>
      <p class="font-medium text-lg">2026</p>
    </div>

    {{-- Big heading --}}
    <h2 class="font-bold my-auto py-16 ts-rv"
        style="font-size:clamp(4rem,14vw,9.5rem);line-height:.95;color:#eaeaea;">
      Get in<br>touch
    </h2>

    {{-- Bottom row --}}
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-10">

      {{-- Contact columns --}}
      <div class="flex flex-col sm:flex-row gap-12 md:gap-20 ts-rv">
        <div class="space-y-3">
          <p style="font-size:18px;color:#dcdcdc;"><strong class="text-white">Mobile</strong>&nbsp;&nbsp;+91 8217707328 (CTO-Office)</p>
          <p style="font-size:18px;color:#dcdcdc;"><strong class="text-white">Email</strong>&nbsp;&nbsp;pijushpal@talishasoftware.tech</p>
          <p style="font-size:18px;color:#dcdcdc;"><strong class="text-white">Mobile</strong>&nbsp;&nbsp;+91 8001087752 (Customer)</p>
          <p style="font-size:18px;color:#dcdcdc;"><strong class="text-white">Social Media</strong>&nbsp;&nbsp;@talishasoftware</p>
        </div>
        <div class="space-y-3">
          <p style="font-size:18px;color:#dcdcdc;"><strong class="text-white">Web</strong>&nbsp;&nbsp;talishasoftware.tech</p>
          <p style="font-size:18px;color:#dcdcdc;"><strong class="text-white">Email</strong>&nbsp;&nbsp;hello@talishasoftware</p>
          <p style="font-size:18px;color:#dcdcdc;"><strong class="text-white">Email</strong>&nbsp;&nbsp;talishasoftware@gmail.com</p>
        </div>
      </div>

      {{-- Credit --}}
      <div style="font-size:20px;color:#cfcfcf;" class="ts-rv" style="transition-delay:.1s;">
        by <span class="font-bold text-white ml-1" style="font-size:28px;">Talisha Software</span>
      </div>

    </div>
  </div>
</section>

{{-- ════════════════════════════════════════════════════════
     JAVASCRIPT — Preloader + Interactions
     ════════════════════════════════════════════════════════ --}}
@push('scripts')
<script>
(function(){
  'use strict';



  /* ── Scroll reveal (IntersectionObserver) ──────────────── */
  function initReveal(){
    if(!window.IntersectionObserver) return;
    var els = document.querySelectorAll('.ts-rv');
    var obs = new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if(e.isIntersecting){
          e.target.classList.remove('ts-hidden');
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.12 });

    els.forEach(function(el){
      el.classList.add('ts-hidden');
      obs.observe(el);
    });
  }

  /* ── AI item panel ─────────────────────────────────────── */
  function initAIPanel(){
    var rows   = document.querySelectorAll('.ts-ai-row');
    var title  = document.getElementById('ts-panel-title');
    var desc   = document.getElementById('ts-panel-desc');
    var data   = [
      { t:'AI Product Development',         d:'Intelligent systems designed for real-world enterprise impact.' },
      { t:'Web3 & Blockchain Engineering',  d:'Decentralised infrastructure built for the next-generation web.' },
      { t:'Enterprise Digital Transformation', d:'Cloud-native and data-driven modernisation strategies.' },
    ];

    function activate(i){
      rows.forEach(function(r, j){
        r.style.opacity      = j === i ? '1' : '0.5';
        r.style.borderBottomColor = j === i ? '#fff' : 'rgba(255,255,255,.1)';
      });
      if(title) title.textContent = data[i].t;
      if(desc)  desc.textContent  = data[i].d;
    }

    rows.forEach(function(r, i){
      r.addEventListener('mouseenter', function(){ activate(i); });
      r.addEventListener('click',      function(){ activate(i); });
    });

    activate(0);
  }

  /* ── GSAP enhancements (optional) ─────────────────────── */
  function initGSAP(){
    if(typeof gsap === 'undefined') return;

    /* Hero heading after preloader */
    if(document.querySelector('.ts-hero-h1')){
      gsap.from('.ts-hero-h1', { y:40, opacity:0, duration:1.2, ease:'power3.out', delay:3.0, clearProps:'all' });
    }

    /* Service card micro-tilt */
    document.querySelectorAll('.ts-svc-card').forEach(function(card){
      card.addEventListener('mousemove', function(e){
        var r = card.getBoundingClientRect();
        var x = (e.clientX - r.left - r.width/2)  / (r.width/2);
        var y = (e.clientY - r.top  - r.height/2) / (r.height/2);
        gsap.to(card, { rotateY:x*5, rotateX:-y*5, duration:.4, ease:'power2.out', transformPerspective:600 });
      });
      card.addEventListener('mouseleave', function(){
        gsap.to(card, { rotateY:0, rotateX:0, duration:.5, ease:'power2.out' });
      });
    });
  }
  /* ── AI Intelligence Core (Canvas) ─────────────────────── */
  function initAICore() {
    var canvas = document.getElementById('ts-ai-core');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var w, h;
    var nodes = [];
    var particles = [];
    var rings = [];
    var mouse = { x: 0, y: 0, targetX: 0, targetY: 0 };
    var time = 0;
    var isVisible = true;
    
    // Config
    var numNodes = 55;
    var maxDist = 130;
    
    function resize() {
      var rect = canvas.getBoundingClientRect();
      var dpr = window.devicePixelRatio || 1;
      w = rect.width;
      h = rect.height;
      canvas.width = w * dpr;
      canvas.height = h * dpr;
      ctx.scale(dpr, dpr);
      initElements();
    }
    
    function initElements() {
      nodes = [];
      particles = [];
      rings = [];
      
      var cx = w / 2;
      var cy = h / 2;
      var radiusLimit = Math.min(w, h) * 0.38;
      
      // Generate rings
      for (var i = 0; i < 3; i++) {
        rings.push({
          rx: radiusLimit * 0.75 + i * 35,
          ry: radiusLimit * 0.35 + i * 15,
          angle: Math.random() * Math.PI * 2,
          speed: (Math.random() > 0.5 ? 1 : -1) * (0.0015 + Math.random() * 0.002),
          tilt: (Math.PI / 6) + (Math.random() * Math.PI / 12),
          dash: [Math.random() * 8 + 4, Math.random() * 15 + 8]
        });
      }
      
      // Generate nodes
      for (var i = 0; i < numNodes; i++) {
        var radius = Math.random() * radiusLimit;
        var angle = Math.random() * Math.PI * 2;
        nodes.push({
          ox: cx + Math.cos(angle) * radius,
          oy: cy + Math.sin(angle) * radius,
          x: 0, y: 0,
          vx: (Math.random() - 0.5) * 0.4,
          vy: (Math.random() - 0.5) * 0.4,
          size: Math.random() * 1.5 + 0.8,
          pulseSpeed: 0.01 + Math.random() * 0.02,
          pulseOffset: Math.random() * Math.PI * 2,
          color: Math.random() > 0.65 ? '#ffffff' : (Math.random() > 0.4 ? '#FF9800' : '#FFB000')
        });
      }
      
      for (var i = 0; i < 25; i++) {
        spawnParticle(true);
      }
    }
    
    function spawnParticle(initial) {
      if (nodes.length < 2) return;
      var n1 = nodes[Math.floor(Math.random() * nodes.length)];
      var n2 = nodes[Math.floor(Math.random() * nodes.length)];
      particles.push({
        n1: n1, n2: n2,
        progress: initial ? Math.random() : 0,
        speed: 0.004 + Math.random() * 0.008
      });
    }
    
    function draw() {
      if (!isVisible) {
        requestAnimationFrame(draw);
        return;
      }
      
      time += 1;
      ctx.clearRect(0, 0, w, h);
      
      // Smooth mouse tracking
      mouse.x += (mouse.targetX - mouse.x) * 0.03;
      mouse.y += (mouse.targetY - mouse.y) * 0.03;
      
      var cx = w / 2;
      var cy = h / 2;
      
      // Subtle ambient core glow
      var coreSize = Math.min(w, h) * 0.18 + Math.sin(time * 0.02) * 6;
      var grad = ctx.createRadialGradient(cx + mouse.x * 0.04, cy + mouse.y * 0.04, 0, cx, cy, coreSize * 2.8);
      grad.addColorStop(0, 'rgba(255, 140, 0, 0.45)');
      grad.addColorStop(0.3, 'rgba(255, 100, 0, 0.15)');
      grad.addColorStop(0.7, 'rgba(255, 50, 0, 0.04)');
      grad.addColorStop(1, 'rgba(0, 0, 0, 0)');
      
      ctx.fillStyle = grad;
      ctx.fillRect(0, 0, w, h);
      
      // Draw rings
      ctx.save();
      ctx.translate(cx + mouse.x * 0.06, cy + mouse.y * 0.06);
      rings.forEach(function(r) {
        r.angle += r.speed;
        ctx.save();
        ctx.rotate(r.tilt);
        ctx.beginPath();
        ctx.ellipse(0, 0, r.rx, r.ry, r.angle, 0, Math.PI * 2);
        ctx.strokeStyle = 'rgba(255, 130, 0, 0.18)';
        ctx.lineWidth = 1;
        ctx.setLineDash(r.dash);
        ctx.stroke();
        ctx.restore();
      });
      ctx.restore();
      
      // Update and draw nodes
      nodes.forEach(function(n) {
        n.ox += n.vx;
        n.oy += n.vy;
        var distToCenter = Math.hypot(n.ox - cx, n.oy - cy);
        if (distToCenter > Math.min(w, h) * 0.42) {
          n.vx *= -1;
          n.vy *= -1;
        }
        n.x = n.ox + mouse.x * 0.08 * (n.size * 0.6);
        n.y = n.oy + mouse.y * 0.08 * (n.size * 0.6);
      });
      
      // Draw connections
      ctx.lineWidth = 0.5;
      for (var i = 0; i < nodes.length; i++) {
        for (var j = i + 1; j < nodes.length; j++) {
          var dx = nodes[i].x - nodes[j].x;
          var dy = nodes[i].y - nodes[j].y;
          var dist = Math.hypot(dx, dy);
          if (dist < maxDist) {
            var alpha = (1 - dist / maxDist) * 0.28;
            ctx.strokeStyle = 'rgba(255, 130, 0, ' + alpha + ')';
            ctx.beginPath();
            ctx.moveTo(nodes[i].x, nodes[i].y);
            ctx.lineTo(nodes[j].x, nodes[j].y);
            ctx.stroke();
          }
        }
      }
      
      // Draw nodes
      nodes.forEach(function(n) {
        var pAlpha = 0.3 + Math.sin(time * n.pulseSpeed + n.pulseOffset) * 0.5;
        ctx.beginPath();
        ctx.arc(n.x, n.y, n.size, 0, Math.PI * 2);
        ctx.fillStyle = n.color;
        ctx.globalAlpha = pAlpha;
        ctx.fill();
        ctx.globalAlpha = 1;
        
        if (pAlpha > 0.6) {
          ctx.beginPath();
          ctx.arc(n.x, n.y, n.size * 3.5, 0, Math.PI * 2);
          ctx.fillStyle = 'rgba(255, 120, 0, ' + (pAlpha * 0.15) + ')';
          ctx.fill();
        }
      });
      
      // Draw flowing particles
      for (var i = particles.length - 1; i >= 0; i--) {
        var p = particles[i];
        p.progress += p.speed;
        if (p.progress >= 1) {
          particles.splice(i, 1);
          spawnParticle(false);
          continue;
        }
        var px = p.n1.x + (p.n2.x - p.n1.x) * p.progress;
        var py = p.n1.y + (p.n2.y - p.n1.y) * p.progress;
        
        ctx.beginPath();
        ctx.arc(px, py, 1.2, 0, Math.PI * 2);
        ctx.fillStyle = '#fff';
        ctx.shadowBlur = 6;
        ctx.shadowColor = '#FF9800';
        ctx.fill();
        ctx.shadowBlur = 0;
      }
      
      // Intense tiny center point
      ctx.beginPath();
      ctx.arc(cx + mouse.x * 0.04, cy + mouse.y * 0.04, 2, 0, Math.PI * 2);
      ctx.fillStyle = '#fff';
      ctx.shadowBlur = 15;
      ctx.shadowColor = '#FFB000';
      ctx.fill();
      ctx.shadowBlur = 0;
      
      requestAnimationFrame(draw);
    }
    
    window.addEventListener('mousemove', function(e) {
      var cx = window.innerWidth / 2;
      var cy = window.innerHeight / 2;
      mouse.targetX = (e.clientX - cx) * 0.2;
      mouse.targetY = (e.clientY - cy) * 0.2;
    });
    
    if (window.IntersectionObserver) {
      var obs = new IntersectionObserver(function(entries) {
        isVisible = entries[0].isIntersecting;
      }, { threshold: 0 });
      obs.observe(canvas);
    }
    
    window.addEventListener('resize', function() {
      clearTimeout(canvas._resizeTimer);
      canvas._resizeTimer = setTimeout(resize, 200);
    });
    
    resize();
    requestAnimationFrame(draw);
  }

  /* ── Mission Canvas: Flowing Digital Energy ──────────────── */
  function initMissionCanvas() {
    var canvas = document.getElementById('ts-mission-canvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var w, h;
    var lines = [];
    var isVisible = true;
    var time = 0;
    
    function resize() {
      var rect = canvas.getBoundingClientRect();
      var dpr = window.devicePixelRatio || 1;
      w = rect.width;
      h = rect.height;
      canvas.width = w * dpr;
      canvas.height = h * dpr;
      ctx.scale(dpr, dpr);
      initElements();
    }
    
    function initElements() {
      lines = [];
      for (var i = 0; i < 8; i++) {
        lines.push({
          yOff: Math.random() * h,
          amp: 30 + Math.random() * 80,
          freq: 0.001 + Math.random() * 0.003,
          speed: 0.5 + Math.random() * 1.5,
          phase: Math.random() * Math.PI * 2,
          opacity: 0.05 + Math.random() * 0.15,
          thickness: 0.5 + Math.random() * 1.5,
          particleProgress: Math.random(),
          particleSpeed: 0.001 + Math.random() * 0.003
        });
      }
    }
    
    function draw() {
      if (!isVisible) {
        requestAnimationFrame(draw);
        return;
      }
      
      time += 1;
      ctx.clearRect(0, 0, w, h);
      
      var cx = w * 0.75;
      var cy = h * 0.5;
      
      // Central focal area (soft glow only, no static dot)
      var coreSize = 10 + Math.sin(time * 0.03) * 4;
      var grad = ctx.createRadialGradient(cx, cy, 0, cx, cy, 150);
      grad.addColorStop(0, 'rgba(255, 122, 0, 0.06)');
      grad.addColorStop(0.5, 'rgba(255, 152, 0, 0.01)');
      grad.addColorStop(1, 'rgba(255, 255, 255, 0)');
      
      ctx.fillStyle = grad;
      ctx.fillRect(0, 0, w, h);
      
      // Draw flowing lines
      lines.forEach(function(l) {
        l.phase -= l.speed * 0.01;
        
        ctx.beginPath();
        for (var x = 0; x <= w; x += 20) {
          var dx = x - cx;
          var pull = Math.max(0, 1 - Math.abs(dx) / 300);
          var y = l.yOff + Math.sin(x * l.freq + l.phase) * l.amp;
          y += (cy - y) * pull * 0.3; // Bend towards center
          
          if (x === 0) ctx.moveTo(x, y);
          else ctx.lineTo(x, y);
        }
        
        ctx.strokeStyle = 'rgba(255, 122, 0, ' + l.opacity + ')';
        ctx.lineWidth = l.thickness;
        ctx.stroke();
        
        // Particle
        l.particleProgress += l.particleSpeed;
        if (l.particleProgress > 1) l.particleProgress = 0;
        
        var px = l.particleProgress * w;
        var pdx = px - cx;
        var ppull = Math.max(0, 1 - Math.abs(pdx) / 300);
        var py = l.yOff + Math.sin(px * l.freq + l.phase) * l.amp;
        py += (cy - py) * ppull * 0.3;
        
        var pAlpha = Math.max(0.1, 1 - Math.abs(pdx) / 400);
        
        ctx.beginPath();
        ctx.arc(px, py, l.thickness + 1, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(255, 150, 0, ' + pAlpha + ')';
        ctx.shadowBlur = 5;
        ctx.shadowColor = '#FF9800';
        ctx.fill();
        ctx.shadowBlur = 0;
      });
      
      requestAnimationFrame(draw);
    }
    
    if (window.IntersectionObserver) {
      var obs = new IntersectionObserver(function(entries) {
        isVisible = entries[0].isIntersecting;
      }, { threshold: 0 });
      obs.observe(canvas);
    }
    
    window.addEventListener('resize', function() {
      clearTimeout(canvas._resizeTimer);
      canvas._resizeTimer = setTimeout(resize, 200);
    });
    
    resize();
    requestAnimationFrame(draw);
  }

  /* ── Service Panel Canvas: Neural Network ──────────────── */
  function initServiceNetwork() {
    var canvas = document.getElementById('ts-service-network');
    var panel = document.getElementById('ts-service-panel');
    if (!canvas || !panel) return;
    
    var ctx = canvas.getContext('2d');
    var w, h;
    var nodes = [];
    var particles = [];
    var time = 0;
    var isVisible = true;
    var isHover = false;
    var mouse = { x: -1000, y: -1000, tx: -1000, ty: -1000 };
    
    // Config
    var numNodes = 25;
    var maxDist = 120;
    
    function resize() {
      var rect = canvas.getBoundingClientRect();
      var dpr = window.devicePixelRatio || 1;
      w = rect.width;
      h = rect.height;
      canvas.width = w * dpr;
      canvas.height = h * dpr;
      ctx.scale(dpr, dpr);
      initElements();
    }
    
    function initElements() {
      nodes = [];
      particles = [];
      for (var i = 0; i < numNodes; i++) {
        nodes.push({
          x: Math.random() * w,
          y: Math.random() * h,
          vx: (Math.random() - 0.5) * 0.4,
          vy: (Math.random() - 0.5) * 0.4,
          size: Math.random() * 2 + 0.5,
          baseAlpha: Math.random() * 0.5 + 0.2
        });
      }
      for (var i = 0; i < 8; i++) spawnParticle(true);
    }
    
    function spawnParticle(initial) {
      if (nodes.length < 2) return;
      var n1 = nodes[Math.floor(Math.random() * nodes.length)];
      var n2 = nodes[Math.floor(Math.random() * nodes.length)];
      particles.push({
        n1: n1, n2: n2,
        progress: initial ? Math.random() : 0,
        speed: 0.005 + Math.random() * 0.015
      });
    }
    
    function draw() {
      if (!isVisible) {
        requestAnimationFrame(draw);
        return;
      }
      
      time += 1;
      ctx.clearRect(0, 0, w, h);
      
      mouse.x += (mouse.tx - mouse.x) * 0.1;
      mouse.y += (mouse.ty - mouse.y) * 0.1;
      
      var globalIntensity = isHover ? 1 : 0.4;
      if (isHover) {
        panel.style.boxShadow = '0 0 30px rgba(255,122,0,0.15)';
        panel.style.borderColor = 'rgba(255,122,0,0.3)';
      } else {
        panel.style.boxShadow = 'none';
        panel.style.borderColor = 'rgba(255,255,255,0.07)';
      }
      
      // Update nodes
      nodes.forEach(function(n) {
        n.x += n.vx;
        n.y += n.vy;
        
        // Bounce
        if (n.x < 0 || n.x > w) n.vx *= -1;
        if (n.y < 0 || n.y > h) n.vy *= -1;
        
        // Mouse repulse/attract
        if (isHover) {
          var dx = mouse.x - n.x;
          var dy = mouse.y - n.y;
          var dist = Math.hypot(dx, dy);
          if (dist < 120) {
            n.x -= (dx / dist) * 0.5;
            n.y -= (dy / dist) * 0.5;
          }
        }
      });
      
      // Draw connections
      ctx.lineWidth = 0.5;
      for (var i = 0; i < nodes.length; i++) {
        for (var j = i + 1; j < nodes.length; j++) {
          var dx = nodes[i].x - nodes[j].x;
          var dy = nodes[i].y - nodes[j].y;
          var dist = Math.hypot(dx, dy);
          var activeDist = isHover ? maxDist * 1.5 : maxDist;
          
          if (dist < activeDist) {
            var alpha = (1 - dist / activeDist) * 0.5 * globalIntensity;
            ctx.strokeStyle = 'rgba(255, 130, 0, ' + alpha + ')';
            ctx.beginPath();
            ctx.moveTo(nodes[i].x, nodes[i].y);
            ctx.lineTo(nodes[j].x, nodes[j].y);
            ctx.stroke();
          }
        }
      }
      
      // Draw nodes
      nodes.forEach(function(n) {
        ctx.beginPath();
        ctx.arc(n.x, n.y, n.size, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(255, 150, 0, ' + (n.baseAlpha * globalIntensity * 2) + ')';
        ctx.fill();
      });
      
      // Draw particles
      for (var i = particles.length - 1; i >= 0; i--) {
        var p = particles[i];
        p.progress += p.speed;
        if (p.progress >= 1) {
          particles.splice(i, 1);
          spawnParticle(false);
          continue;
        }
        var px = p.n1.x + (p.n2.x - p.n1.x) * p.progress;
        var py = p.n1.y + (p.n2.y - p.n1.y) * p.progress;
        
        ctx.beginPath();
        ctx.arc(px, py, 1.5, 0, Math.PI * 2);
        ctx.fillStyle = '#fff';
        if (isHover) {
          ctx.shadowBlur = 8;
          ctx.shadowColor = '#FF9800';
        }
        ctx.globalAlpha = globalIntensity;
        ctx.fill();
        ctx.shadowBlur = 0;
        ctx.globalAlpha = 1;
      }
      
      requestAnimationFrame(draw);
    }
    
    panel.addEventListener('mousemove', function(e) {
      var rect = canvas.getBoundingClientRect();
      mouse.tx = e.clientX - rect.left;
      mouse.ty = e.clientY - rect.top;
    });
    
    panel.addEventListener('mouseenter', function() { isHover = true; });
    panel.addEventListener('mouseleave', function() { isHover = false; });
    
    if (window.IntersectionObserver) {
      var obs = new IntersectionObserver(function(entries) {
        isVisible = entries[0].isIntersecting;
      }, { threshold: 0 });
      obs.observe(canvas);
    }
    
    window.addEventListener('resize', function() {
      clearTimeout(canvas._resizeTimer);
      canvas._resizeTimer = setTimeout(resize, 200);
    });
    
    resize();
    requestAnimationFrame(draw);
  }

  window.addEventListener('load', function(){
    initReveal();
    initAIPanel();
    initAICore();
    initMissionCanvas();
    initServiceNetwork();
    setTimeout(initGSAP, 3200);
  });

})();
</script>
@endpush

</x-layout.app>
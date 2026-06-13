</main>

</main>

<footer class="bg-slate-50 border-t border-slate-200 pt-6 pb-4">
    <div class="container-custom">
        <div class="grid grid-cols-2 lg:grid-cols-12 gap-6 lg:gap-8 mb-6">
            <!-- Column 1: Brand & Focus -->
            <div class="col-span-2 lg:col-span-4">
                <a href="index.php" class="flex items-center gap-3 mb-3 group">
                    <div class="logo-circle !w-8 !h-8 !text-base">
                        S<span>.</span>
                    </div>
                    <span class="text-lg font-bold text-primary tracking-tight font-heading group-hover:text-accent transition-colors">Shahzad</span>
                </a>
                <p class="text-secondary text-xs lg:text-sm max-w-sm leading-relaxed mb-4">
                    A professional web developer dedicated to building high-quality, user-centric digital experiences that merge technical precision with creative vision.
                </p>
                <div class="flex space-x-3">
                    <?php if($settings['github_link']): ?>
                        <a href="<?php echo $settings['github_link']; ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-secondary hover:bg-accent hover:text-white hover:border-accent hover:-translate-y-0.5 transition-all shadow-sm">
                            <i class="fab fa-github text-sm"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($settings['linkedin_link']): ?>
                        <a href="<?php echo $settings['linkedin_link']; ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-secondary hover:bg-accent hover:text-white hover:border-accent hover:-translate-y-0.5 transition-all shadow-sm">
                            <i class="fab fa-linkedin-in text-sm"></i>
                        </a>
                    <?php endif; ?>
                    <?php if($settings['whatsapp_number']): ?>
                        <a href="https://wa.me/<?php echo $settings['whatsapp_number']; ?>" target="_blank" class="w-9 h-9 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-secondary hover:bg-accent hover:text-white hover:border-accent hover:-translate-y-0.5 transition-all shadow-sm">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Column 2: Structural Navigation -->
            <div class="col-span-1 lg:col-span-2">
                <h4 class="text-[10px] font-bold uppercase tracking-[0.2em] text-primary mb-4 font-heading">Quick Links</h4>
                <ul class="space-y-2 text-secondary font-medium text-xs">
                    <li><a href="index.php" class="hover:text-accent transition-colors flex items-center group"><i class="fas fa-chevron-right text-[8px] mr-1.5 opacity-0 group-hover:opacity-100 -ml-3 group-hover:ml-0 transition-all"></i> Home</a></li>
                    <li><a href="about.php" class="hover:text-accent transition-colors flex items-center group"><i class="fas fa-chevron-right text-[8px] mr-1.5 opacity-0 group-hover:opacity-100 -ml-3 group-hover:ml-0 transition-all"></i> About</a></li>
                    <li><a href="projects.php" class="hover:text-accent transition-colors flex items-center group"><i class="fas fa-chevron-right text-[8px] mr-1.5 opacity-0 group-hover:opacity-100 -ml-3 group-hover:ml-0 transition-all"></i> Portfolio</a></li>
                    <li><a href="contact.php" class="hover:text-accent transition-colors flex items-center group"><i class="fas fa-chevron-right text-[8px] mr-1.5 opacity-0 group-hover:opacity-100 -ml-3 group-hover:ml-0 transition-all"></i> Contact</a></li>
                </ul>
            </div>

            <!-- Column 3: Core Expertise -->
            <div class="col-span-1 lg:col-span-3">
                <h4 class="text-[10px] font-bold uppercase tracking-[0.2em] text-primary mb-4 font-heading">Expertise</h4>
                <ul class="space-y-2 text-secondary font-medium text-xs">
                    <li class="flex items-center space-x-1.5"><span class="w-1 h-1 rounded-full bg-accent/30"></span> <span>Full-Stack</span></li>
                    <li class="flex items-center space-x-1.5"><span class="w-1 h-1 rounded-full bg-accent/30"></span> <span>UI/UX Systems</span></li>
                    <li class="flex items-center space-x-1.5"><span class="w-1 h-1 rounded-full bg-accent/30"></span> <span>Performance</span></li>
                    <li class="flex items-center space-x-1.5"><span class="w-1 h-1 rounded-full bg-accent/30"></span> <span>Architecture</span></li>
                </ul>
            </div>
            
            <!-- Column 4: Connection Hub -->
            <div class="col-span-2 lg:col-span-3">
                <h4 class="text-[10px] font-bold uppercase tracking-[0.2em] text-primary mb-4 font-heading">Connection</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-4">
                    <div class="flex items-start space-x-2.5 group">
                        <div class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all shadow-sm">
                            <i class="fas fa-envelope-open text-xs"></i>
                        </div>
                        <div>
                            <span class="block text-[9px] font-bold uppercase tracking-widest text-secondary mb-0.5">Email</span>
                            <a href="mailto:<?php echo $settings['contact_email']; ?>" class="text-[10px] sm:text-xs font-bold text-primary hover:text-accent transition-colors"><?php echo $settings['contact_email']; ?></a>
                        </div>
                    </div>
                    <div class="flex items-start space-x-2.5 group">
                        <div class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all shadow-sm">
                            <i class="fas fa-comment-dots text-xs"></i>
                        </div>
                        <div>
                            <span class="block text-[9px] font-bold uppercase tracking-widest text-secondary mb-0.5">WhatsApp</span>
                            <a href="https://wa.me/<?php echo $settings['whatsapp_number']; ?>" class="text-[10px] sm:text-xs font-bold text-primary hover:text-accent transition-colors"><?php echo $settings['whatsapp_number']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Banner: Grounded Compliance -->
        <div class="pt-4 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-3">
            <div class="flex flex-col md:flex-row items-center gap-2 md:gap-4">
                <p class="text-secondary text-[10px] font-medium tracking-wide">
                    &copy; <?php echo date('Y'); ?> <span class="text-primary font-bold">Shahzad.</span> All rights reserved.
                </p>
                <div class="hidden md:block w-px h-2.5 bg-slate-300"></div>
                <p class="text-[10px] text-secondary/60">
                    <?php echo $settings['footer_text']; ?>
                </p>
            </div>
            <div class="flex items-center space-x-4">
                <a href="privacy-policy.php" class="text-[10px] font-bold uppercase tracking-widest text-secondary hover:text-accent transition-colors">Privacy Policy</a>
                <a href="#" class="text-[10px] font-bold uppercase tracking-widest text-secondary hover:text-accent transition-colors">Terms</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.2/dist/ScrollTrigger.min.js"></script>
<script>
    gsap.registerPlugin(ScrollTrigger);

    document.addEventListener('DOMContentLoaded', () => {
        // Subtle page-in animation
        gsap.from("main > section", {
            opacity: 0,
            y: 20,
            duration: 0.8,
            stagger: 0.1,
            ease: "power2.out",
            clearProps: "all"
        });

        // Sticky Navbar shadow on scroll
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 20) {
                navbar.classList.add('shadow-lg', 'shadow-slate-200/50');
            } else {
                navbar.classList.remove('shadow-lg', 'shadow-slate-200/50');
            }
        });

        // Project Cards Mouse Interaction
        const cards = document.querySelectorAll('.project-card-premium');
        cards.forEach(card => {
            const img = card.querySelector('img');
            const content = card.querySelector('.project-content');
            
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const xPercent = (x / rect.width - 0.5) * 20;
                const yPercent = (y / rect.height - 0.5) * 20;

                gsap.to(img, {
                    x: xPercent,
                    y: yPercent,
                    scale: 1.1,
                    duration: 0.5,
                    ease: "power2.out"
                });

                gsap.to(content, {
                    y: -5,
                    duration: 0.3,
                    ease: "power2.out"
                });
            });

            card.addEventListener('mouseleave', () => {
                gsap.to(img, {
                    x: 0,
                    y: 0,
                    scale: 1,
                    duration: 0.8,
                    ease: "power2.out"
                });

                gsap.to(content, {
                    y: 0,
                    duration: 0.5,
                    ease: "power2.out"
                });
            });
        });
    });
</script>
</body>
</html>

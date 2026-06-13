<?php include 'includes/header.php'; ?>

<!-- Hero Section: Clarity & Trust -->
<section class="pt-4 pb-2 lg:pt-8 lg:pb-4 bg-white">
    <div class="container-custom">
        <div class="flex flex-col lg:flex-row items-center gap-6 lg:gap-12">
            <div class="lg:w-1/2">
                <span class="pill mb-2 scale-75 origin-left">Available for new opportunities</span>
                <h1 class="text-3xl lg:text-4xl mb-2 leading-[1.1] font-heading">
                    Building products that <span class="text-accent">matter.</span>
                </h1>
                <p class="text-sm lg:text-base text-secondary mb-4 max-w-xl leading-relaxed">
                    I'm Shahzad, a professional web developer focused on creating clean, functional, and user-centric digital experiences for modern businesses.
                </p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <a href="projects.php" class="btn-primary py-2 px-6 text-xs">View My Work</a>
                    <a href="contact.php" class="btn-outline py-2 px-6 text-xs">Let's Talk</a>
                </div>
            </div>
            <div class="lg:w-1/2">
                <div class="img-frame bg-slate-50 aspect-[16/10] flex items-center justify-center relative shadow-inner overflow-hidden max-w-lg mx-auto lg:ml-auto lg:mr-0">
                    <?php if($settings['hero_image']): ?>
                        <img src="assets/uploads/<?php echo $settings['hero_image']; ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <i class="fas fa-user-tie text-slate-200 text-[6rem]"></i>
                    <?php endif; ?>
                    <!-- Decorative Element -->
                    <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-accent/5 rounded-full blur-2xl"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Ribbon: Modern Stack -->
<div class="bg-white border-y border-slate-100 py-3 overflow-hidden">
    <div class="container-custom">
        <div class="flex flex-wrap items-center justify-center gap-x-8 gap-y-4 lg:gap-x-12 opacity-40 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
            <div class="flex items-center gap-2">
                <i class="fab fa-html5 text-xl"></i>
                <span class="text-[10px] font-bold uppercase tracking-widest">HTML5</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fab fa-css3-alt text-xl"></i>
                <span class="text-[10px] font-bold uppercase tracking-widest">CSS3</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fab fa-js text-xl"></i>
                <span class="text-[10px] font-bold uppercase tracking-widest">JavaScript</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fab fa-php text-xl"></i>
                <span class="text-[10px] font-bold uppercase tracking-widest">PHP / SQL</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fab fa-react text-xl"></i>
                <span class="text-[10px] font-bold uppercase tracking-widest">React.js</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fab fa-wordpress text-xl"></i>
                <span class="text-[10px] font-bold uppercase tracking-widest">CMS Architecture</span>
            </div>
        </div>
    </div>
</div>

<!-- Values / Expertise -->
<section class="bg-slate-50/50 py-8 lg:py-12">
    <div class="container-custom">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-accent text-[10px] font-bold uppercase tracking-[0.3em] mb-3 block">My Philosophy</span>
            <h2 class="text-2xl lg:text-3xl mb-3 font-heading">How I help you succeed</h2>
            <p class="text-secondary text-sm lg:text-base opacity-80">Combining technical excellence with a human-centric approach to build digital products that perform.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <div class="card-professional group">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all">
                        <i class="fas fa-code text-lg"></i>
                    </div>
                    <span class="text-slate-200 text-2xl font-black font-heading opacity-50 group-hover:text-accent group-hover:opacity-20 transition-all">01</span>
                </div>
                <h3 class="text-lg font-bold mb-3 font-heading">Clean Architecture</h3>
                <p class="text-secondary text-sm leading-relaxed">Developing scalable, maintainable backends and clean codebases that grow with your business needs.</p>
            </div>
            <div class="card-professional group">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all">
                        <i class="fas fa-layer-group text-lg"></i>
                    </div>
                    <span class="text-slate-200 text-2xl font-black font-heading opacity-50 group-hover:text-accent group-hover:opacity-20 transition-all">02</span>
                </div>
                <h3 class="text-lg font-bold mb-3 font-heading">User-Centric Design</h3>
                <p class="text-secondary text-sm leading-relaxed">Creating intuitive interfaces that focus on the user journey and provide a seamless digital experience.</p>
            </div>
            <div class="card-professional group">
                <div class="flex justify-between items-start mb-6">
                    <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all">
                        <i class="fas fa-rocket text-lg"></i>
                    </div>
                    <span class="text-slate-200 text-2xl font-black font-heading opacity-50 group-hover:text-accent group-hover:opacity-20 transition-all">03</span>
                </div>
                <h3 class="text-lg font-bold mb-3 font-heading">Performance First</h3>
                <p class="text-secondary text-sm leading-relaxed">Optimizing every line of code to ensure lightning-fast load times and high conversion rates across all devices.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Portfolio -->
<section class="bg-white py-8 lg:py-12">
    <div class="container-custom">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 lg:mb-10 gap-6">
            <div class="max-w-2xl">
                <span class="text-accent text-[10px] font-bold uppercase tracking-[0.3em] mb-3 block">Portfolio</span>
                <h2 class="text-2xl lg:text-3xl mb-3 font-heading">Selected Projects</h2>
                <p class="text-secondary text-sm lg:text-base opacity-80">A showcase of recent work where design meets technical precision.</p>
            </div>
            <a href="projects.php" class="text-accent text-xs font-bold hover:gap-3 transition-all flex items-center gap-2 mb-2 lg:mb-0">
                Explore Full Archive <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $projects = mysqli_query($conn, "SELECT p.*, c.name as category_name FROM projects p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.id DESC LIMIT 9");
            while($project = mysqli_fetch_assoc($projects)):
            ?>
            <div class="project-item group">
                <a href="project-details.php?id=<?php echo $project['id']; ?>" class="project-card-premium block h-full">
                    <div class="project-image-wrapper">
                         <img src="assets/uploads/<?php echo $project['image']; ?>" alt="<?php echo $project['title']; ?>">
                         <div class="project-overlay">
                             <span class="text-white text-xs font-bold uppercase tracking-widest bg-accent/90 px-3 py-1 rounded-full px-4">View Project</span>
                         </div>
                    </div>
                    
                    <div class="project-content space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-accent text-[10px] font-bold uppercase tracking-widest"><?php echo $project['category_name']; ?></span>
                            <span class="text-slate-400 text-[10px] font-medium uppercase tracking-widest"><?php echo date('Y', strtotime($project['completion_date'])); ?></span>
                        </div>
                        <h3 class="text-xl font-bold text-primary group-hover:text-accent transition-colors font-heading leading-tight">
                            <?php echo $project['title']; ?>
                        </h3>
                        <p class="text-secondary text-sm line-clamp-2 leading-relaxed opacity-80 group-hover:opacity-100 transition-opacity">
                            <?php echo strip_tags($project['description']); ?>
                        </p>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-primary py-4 lg:py-6">
    <div class="container-custom">
        <div class="bg-accent rounded-2xl p-6 md:p-10 text-center text-white relative overflow-hidden shadow-2xl">
            <div class="relative z-10 max-w-3xl mx-auto">
                <h2 class="text-white text-3xl lg:text-4xl mb-4 font-heading">Ready to bring your vision to life?</h2>
                <p class="text-white/80 text-base mb-6">I'm currently accepting new projects and would love to hear about what you're working on.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="contact.php" class="px-8 py-3 bg-white text-accent font-bold rounded-xl hover:bg-slate-50 transition-all shadow-xl">
                        Let's Work Together
                    </a>
                    <a href="mailto:<?php echo $settings['contact_email']; ?>" class="px-8 py-3 bg-primary/20 backdrop-blur-sm text-white font-bold rounded-xl border border-white/20 hover:bg-white/10 transition-all">
                        Send an Email
                    </a>
                </div>
            </div>
            <!-- Subtle Background Decorations -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

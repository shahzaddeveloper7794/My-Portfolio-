<?php include 'includes/header.php'; ?>

<!-- Page Header: High Impact -->
<section class="pt-6 pb-4 lg:pt-10 lg:pb-8 bg-white overflow-hidden bg-pattern">
    <div class="container-custom">
        <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
            <div class="lg:w-3/5">
                <span class="pill mb-3">About Me</span>
                <h1 class="text-3xl lg:text-5xl mb-4 leading-[1.1] font-heading">
                    Merging technical <span class="text-accent">precision</span> with creative vision.
                </h1>
                <p class="text-sm lg:text-lg text-secondary leading-relaxed opacity-90">
                    I help businesses build digital products that are not just visually stunning, but functionally superior and easy to use. Based in Multan, Pakistan, I specialize in crafting full-stack solutions that drive growth.
                </p>
                <div class="flex items-center gap-4 mt-6">
                    <a href="contact.php" class="btn-primary py-2 px-6 text-xs">Work With Me</a>
                    <a href="#journey" class="text-secondary text-xs font-bold hover:text-accent transition-colors">My Journey <i class="fas fa-chevron-down ml-1 text-[10px]"></i></a>
                </div>
            </div>
            <div class="lg:w-2/5">
                <div class="img-frame-premium aspect-[4/5] max-w-sm mx-auto">
                    <img src="assets/uploads/about.jpeg" alt="Professional Portrait" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Value Proposition & Skills -->
<section class="bg-slate-50/30 py-8 lg:py-12 border-y border-slate-100">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Technical Expertise -->
            <div class="lg:col-span-7">
                <div class="mb-8">
                    <span class="text-accent text-[10px] font-bold uppercase tracking-[0.3em] mb-3 block">Technical Arsenal</span>
                    <h2 class="text-2xl lg:text-3xl font-heading mb-6">Expertise & Skills</h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-6">
                        <?php 
                        $skills_query = mysqli_query($conn, "SELECT * FROM skills ORDER BY percentage DESC LIMIT 6");
                        while($skill = mysqli_fetch_assoc($skills_query)):
                        ?>
                        <div class="space-y-2">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-bold text-primary uppercase tracking-wider"><?php echo $skill['name']; ?></span>
                                <span class="text-[10px] font-bold text-accent"><?php echo $skill['percentage']; ?>%</span>
                            </div>
                            <div class="progress-container">
                                <div class="progress-fill" style="width: <?php echo $skill['percentage']; ?>%"></div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>

                <div class="p-6 bg-white rounded-2xl border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-bold text-primary mb-4 font-heading">A human-centric approach to engineering.</h3>
                    <div class="text-secondary text-sm leading-relaxed space-y-3">
                        <?php echo nl2br(htmlspecialchars($settings['about_text'])); ?>
                    </div>
                </div>
            </div>

            <!-- Core Values -->
            <div class="lg:col-span-5">
                <div class="sticky top-20">
                    <span class="text-accent text-[10px] font-bold uppercase tracking-[0.3em] mb-3 block">My Philosophy</span>
                    <h2 class="text-2xl lg:text-3xl font-heading mb-6">Values I Live By</h2>
                    
                    <div class="space-y-4">
                        <div class="p-4 bg-white rounded-xl border border-slate-100 hover:border-accent/30 transition-all group shadow-sm">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all">
                                    <i class="fas fa-check"></i>
                                </div>
                                <div>
                                    <h4 class="text-[11px] font-bold uppercase tracking-widest text-primary mb-1">Clarity & Ease</h4>
                                    <p class="text-secondary text-xs leading-normal">Complex problems deserve simple, elegant solutions that anyone can use.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-white rounded-xl border border-slate-100 hover:border-accent/30 transition-all group shadow-sm">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all">
                                    <i class="fas fa-microchip"></i>
                                </div>
                                <div>
                                    <h4 class="text-[11px] font-bold uppercase tracking-widest text-primary mb-1">Code Excellence</h4>
                                    <p class="text-secondary text-xs leading-normal">Clean, maintainable code is the bedrock of every successful digital product.</p>
                                </div>
                            </div>
                        </div>
                        <div class="p-4 bg-white rounded-xl border border-slate-100 hover:border-accent/30 transition-all group shadow-sm">
                            <div class="flex items-center gap-4">
                                <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center text-accent group-hover:bg-accent group-hover:text-white transition-all">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <div>
                                    <h4 class="text-[11px] font-bold uppercase tracking-widest text-primary mb-1">Open Partnership</h4>
                                    <p class="text-secondary text-xs leading-normal">I work as a partner, not just a vendor, to ensure your goals are met.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="card-professional !bg-white !p-4 border-slate-100">
                            <div class="text-accent text-2xl font-bold mb-1"><?php echo date('Y') - 2018; ?>+</div>
                            <div class="text-[9px] font-bold uppercase tracking-wider text-primary opacity-60">Years in Tech</div>
                        </div>
                        <div class="card-professional !bg-white !p-4 border-slate-100">
                            <div class="text-accent text-2xl font-bold mb-1">50+</div>
                            <div class="text-[9px] font-bold uppercase tracking-wider text-primary opacity-60">Success Stories</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Deployment / History -->
<section id="journey" class="bg-white py-8 lg:py-12">
    <div class="container-custom">
        <div class="max-w-3xl mb-10">
            <span class="text-accent text-[10px] font-bold uppercase tracking-[0.3em] mb-3 block">Professional Journey</span>
            <h2 class="text-2xl lg:text-3xl mb-3 font-heading">Career Milestones</h2>
            <p class="text-secondary text-sm lg:text-base opacity-80">A timeline of my professional growth and the organizations I've helped succeed.</p>
        </div>
        
        <div class="space-y-2">
            <?php 
            $experience = mysqli_query($conn, "SELECT * FROM qualifications WHERE type = 'experience' ORDER BY year DESC");
            while($exp = mysqli_fetch_assoc($experience)):
            ?>
            <div class="group border-b border-slate-100 py-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4 hover:bg-slate-50/50 px-4 transition-all rounded-xl -mx-4">
                <div class="space-y-1">
                    <span class="text-accent text-[10px] font-bold tracking-widest uppercase"><?php echo htmlspecialchars($exp['year']); ?></span>
                    <h3 class="text-lg font-bold text-primary group-hover:text-accent transition-colors font-heading"><?php echo $exp['title']; ?></h3>
                    <div class="flex items-center space-x-2 text-secondary text-xs font-medium">
                        <span><?php echo $exp['institute']; ?></span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <i class="fas fa-arrow-right text-[10px] text-slate-300 group-hover:text-accent group-hover:translate-x-1 transition-all"></i>
                </div>
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
                <h2 class="text-white text-2xl lg:text-3xl mb-4 font-heading">Ready to build something exceptional?</h2>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="contact.php" class="px-8 py-3 bg-white text-accent font-bold rounded-xl hover:bg-slate-50 transition-all shadow-xl text-sm">Start a Conversation</a>
                    <a href="projects.php" class="px-8 py-3 bg-primary/20 backdrop-blur-sm text-white font-bold rounded-xl border border-white/20 hover:bg-white/10 transition-all text-sm">Explore My Work</a>
                </div>
            </div>
            <!-- Subtle Background Decorations -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<?php include 'includes/header.php'; ?>

<!-- Page Header: Clarity & Focus -->
<section class="pt-4 pb-2 lg:pt-8 lg:pb-4 bg-white">
    <div class="container-custom">
        <div class="max-w-3xl">
            <span class="pill mb-2 scale-75 origin-left">Portfolio</span>
            <h1 class="text-3xl lg:text-4xl mb-2 leading-[1.1] font-heading">
                Selected <span class="text-accent font-heading">Deployments.</span>
            </h1>
            <p class="text-sm lg:text-base text-secondary leading-relaxed">
                A detailed archive of my recent work, focusing on performance, scalability, and exceptional user experiences.
            </p>
        </div>
    </div>
</section>

<!-- Project Exhibition Grid -->
<section class="bg-bglight py-12 lg:py-20">
    <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $projects = mysqli_query($conn, "SELECT p.*, c.name as category_name FROM projects p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created_at DESC");
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
<section class="bg-white py-12 lg:py-20 border-t border-slate-100">
    <div class="container-custom text-center">
        <div class="bg-accent rounded-3xl p-10 md:p-16 text-white relative overflow-hidden shadow-2xl">
            <div class="relative z-10 max-w-3xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 font-heading">Inspired by what you see?</h2>
                <p class="text-white/80 text-lg mb-8">I'm currently available for full-time roles and freelance partnerships.</p>
                <a href="contact.php" class="px-12 py-5 bg-white text-accent font-bold rounded-xl hover:bg-slate-50 transition-all shadow-xl inline-block">
                    Let's Work Together
                </a>
            </div>
            <!-- Subtle Overlay -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/5 rounded-full -ml-24 -mb-24"></div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

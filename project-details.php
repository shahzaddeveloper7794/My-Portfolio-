<?php include 'includes/header.php'; ?>

<?php
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT p.*, c.name as category_name FROM projects p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = $id";
    $result = mysqli_query($conn, $query);
    
    if($result && mysqli_num_rows($result) > 0) {
        $project = mysqli_fetch_assoc($result);
    } else {
        echo "<script>window.location.href='projects.php';</script>";
        exit;
    }
} else {
    echo "<script>window.location.href='projects.php';</script>";
    exit;
}
?>

<!-- Project Hero: Clarity & Impact -->
<section class="pt-4 pb-2 lg:pt-8 lg:pb-4 bg-white">
    <div class="container-custom">
        <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-8">
            <div class="max-w-4xl">
                <span class="pill mb-2 scale-75 origin-left"><?php echo $project['category_name']; ?></span>
                <h1 class="text-3xl lg:text-4xl mb-2 leading-[1.1] font-heading"><?php echo $project['title']; ?></h1>
            </div>
            <div class="pb-2">
                <?php if($project['link']): ?>
                    <a href="<?php echo $project['link']; ?>" target="_blank" class="btn-primary">Visit Live Project</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Project Overview Data -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 pt-8 border-t border-slate-100">
            <div class="flex flex-col">
                <span class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-3">Client</span>
                <span class="text-lg font-bold text-primary font-heading"><?php echo $project['client']; ?></span>
            </div>
            <div class="flex flex-col">
                <span class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-3">Service</span>
                <span class="text-lg font-bold text-primary font-heading"><?php echo $project['category_name']; ?></span>
            </div>
            <div class="flex flex-col">
                <span class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-3">Completion</span>
                <span class="text-lg font-bold text-primary font-heading"><?php echo date('F Y', strtotime($project['completion_date'])); ?></span>
            </div>
            <div class="flex flex-col">
                <span class="text-slate-400 text-[10px] font-bold uppercase tracking-[0.2em] mb-3">Role</span>
                <span class="text-lg font-bold text-primary font-heading">Lead Developer</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Visual Asset -->
<section class="bg-bglight py-8 lg:py-16">
    <div class="container-custom">
        <div class="img-frame aspect-video mb-12 overflow-hidden shadow-2xl">
             <?php if($project['image']): ?>
                <img src="assets/uploads/<?php echo $project['image']; ?>" class="w-full h-full object-cover">
            <?php endif; ?>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
            <div class="lg:col-span-4 lg:sticky lg:top-24">
                <h2 class="text-3xl font-bold text-primary tracking-tight mb-8 font-heading">Project <br>Background.</h2>
                <div class="space-y-4">
                    <p class="text-secondary">This project represents a deep dive into the specific needs of the <?php echo strtolower($project['category_name']); ?> industry.</p>
                </div>
            </div>
            <div class="lg:col-span-8">
                <div class="bg-white p-12 lg:p-16 rounded-3xl shadow-sm border border-slate-100">
                    <div class="text-secondary text-lg leading-relaxed space-y-8">
                        <?php echo nl2br(htmlspecialchars($project['description'])); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
<section class="py-12 lg:py-20 bg-white">
    <div class="container-custom">
        <div class="flex items-end justify-between mb-16 gap-8">
            <h3 class="text-3xl font-bold text-primary tracking-tight font-heading">More Projects</h3>
            <a href="projects.php" class="text-accent font-bold hover:underline flex items-center gap-2">
                Explore All <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
             <?php
            $related = mysqli_query($conn, "SELECT p.*, c.name as category_name FROM projects p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id != $id ORDER BY RAND() LIMIT 3");
            while($rel = mysqli_fetch_assoc($related)):
            ?>
            <div class="project-item group">
                <a href="project-details.php?id=<?php echo $rel['id']; ?>" class="project-card-premium block h-full">
                    <div class="project-image-wrapper">
                         <?php if($rel['image']): ?>
                            <img src="assets/uploads/<?php echo $rel['image']; ?>" alt="<?php echo $rel['title']; ?>">
                        <?php endif; ?>
                        <div class="project-overlay">
                             <span class="text-white text-xs font-bold uppercase tracking-widest bg-accent/90 px-3 py-1 rounded-full px-4">View Case Study</span>
                         </div>
                    </div>
                    <div class="project-content p-6 space-y-3">
                        <span class="text-accent text-[10px] font-bold uppercase tracking-widest block"><?php echo $rel['category_name']; ?></span>
                        <h4 class="text-xl font-bold text-primary group-hover:text-accent transition-colors font-heading leading-tight"><?php echo $rel['title']; ?></h4>
                    </div>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<?php include 'includes/header.php'; ?>

<!-- Page Header: Friendly & Inviting -->
<section class="pt-4 pb-2 lg:pt-8 lg:pb-4 bg-white">
    <div class="container-custom">
        <div class="max-w-3xl">
            <span class="pill mb-2 scale-75 origin-left">Contact</span>
            <h1 class="text-3xl lg:text-4xl mb-2 leading-[1.1] font-heading">
                Let's start <span class="text-accent">something</span> great.
            </h1>
            <p class="text-sm lg:text-base text-secondary leading-relaxed">
                Whether you have a specific project in mind or just want to say hi, I'd love to hear from you.
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="bg-bglight py-6 lg:py-10">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            
            <!-- Contact Form (Left) -->
            <div class="lg:col-span-7">
                <div class="p-6 lg:p-8 bg-white rounded-2xl shadow-sm border border-slate-100">
                    <h2 class="text-xl font-bold text-primary mb-6 font-heading">Send a Message</h2>
                    
                    <?php if(isset($_GET['success'])): ?>
                        <div class="mb-8 p-5 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl flex items-center gap-4">
                            <i class="fas fa-check-circle text-emerald-400"></i>
                            <p class="text-sm font-medium">Message sent successfully! I'll get back to you soon.</p>
                        </div>
                    <?php endif; ?>

                    <?php if(isset($_GET['error'])): ?>
                        <div class="mb-8 p-5 bg-rose-50 border border-rose-100 text-rose-700 rounded-xl flex items-center gap-4">
                            <i class="fas fa-exclamation-circle text-rose-400"></i>
                            <p class="text-sm font-medium">Something went wrong. Please try again later.</p>
                        </div>
                    <?php endif; ?>
                    
                    <form action="actions/contact_action.php" method="POST" class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-primary uppercase tracking-widest">Full Name</label>
                                <input type="text" name="name" placeholder="John Doe" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-primary text-sm focus:border-accent focus:bg-white outline-none transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-[10px] font-bold text-primary uppercase tracking-widest">Email Address</label>
                                <input type="email" name="email" placeholder="john@example.com" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-primary text-sm focus:border-accent focus:bg-white outline-none transition-all">
                            </div>
                        </div>
                        
                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold text-primary uppercase tracking-widest">Subject</label>
                            <input type="text" name="subject" placeholder="What's your project about?" required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-primary text-sm focus:border-accent focus:bg-white outline-none transition-all">
                        </div>

                        <div class="space-y-1.5">
                            <label class="text-[10px] font-bold text-primary uppercase tracking-widest">Message</label>
                            <textarea name="message" rows="4" placeholder="Tell me more about your goals..." required class="w-full bg-slate-50 border border-slate-200 rounded-xl p-3 text-primary text-sm focus:border-accent focus:bg-white outline-none transition-all resize-none"></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn-primary !w-full !py-3 !text-base shadow-lg shadow-accent/15">
                            Send Message <i class="fas fa-paper-plane ml-3 text-xs opacity-50"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info (Right) -->
            <div class="lg:col-span-5 lg:sticky lg:top-20">
                <div class="space-y-8 pl-0 lg:pl-8">
                    <div>
                        <h3 class="text-xs font-bold text-accent uppercase tracking-[0.22em] mb-6 font-heading">Direct Contact</h3>
                        
                        <div class="space-y-6">
                            <div class="group">
                                 <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-1.5 block">Email Me</span>
                                 <a href="mailto:<?php echo $settings['contact_email']; ?>" class="text-lg md:text-xl font-bold text-primary hover:text-accent transition-colors block"><?php echo $settings['contact_email']; ?></a>
                                 <p class="text-secondary text-xs mt-0.5 opacity-70">Expect a response within 24 hours.</p>
                            </div>
                            
                            <div class="group">
                                 <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-1.5 block">Call / WhatsApp</span>
                                 <a href="tel:<?php echo $settings['whatsapp_number']; ?>" class="text-lg md:text-xl font-bold text-primary hover:text-accent transition-colors block"><?php echo $settings['whatsapp_number']; ?></a>
                            </div>
                            
                            <div class="group">
                                 <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mb-1.5 block">Location</span>
                                 <span class="text-lg md:text-xl font-bold text-primary block"><?php echo $settings['contact_address']; ?></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-6 border-t border-slate-200">
                         <h3 class="text-xs font-bold text-accent uppercase tracking-[0.22em] mb-6 font-heading">My Network</h3>
                         <div class="flex space-x-4">
                            <?php if($settings['github_link']): ?>
                                <a href="<?php echo $settings['github_link']; ?>" target="_blank" class="w-11 h-11 rounded-full bg-white border border-slate-200 flex items-center justify-center text-primary hover:bg-accent hover:text-white hover:border-accent transition-all shadow-sm">
                                    <i class="fab fa-github text-lg"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($settings['linkedin_link']): ?>
                                <a href="<?php echo $settings['linkedin_link']; ?>" target="_blank" class="w-11 h-11 rounded-full bg-white border border-slate-200 flex items-center justify-center text-primary hover:bg-accent hover:text-white hover:border-accent transition-all shadow-sm">
                                    <i class="fab fa-linkedin-in text-lg"></i>
                                </a>
                            <?php endif; ?>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

// Initialize when the DOM is fully loaded
document.addEventListener("DOMContentLoaded", function() {
    // Mobile menu toggle
    const menuToggle = document.querySelector(".menu-toggle");
    const navMenu = document.querySelector(".nav-menu");
    
    if (menuToggle && navMenu) {
        menuToggle.addEventListener("click", () => {
            navMenu.classList.toggle("active");
            menuToggle.classList.toggle("active");
        });
    }
    
    // Close the mobile menu when clicking outside
    document.addEventListener("click", (e) => {
        if (navMenu && navMenu.classList.contains("active") && 
            !e.target.closest(".nav-menu") && 
            !e.target.closest(".menu-toggle")) {
            navMenu.classList.remove("active");
            if (menuToggle) {
                menuToggle.classList.remove("active");
            }
        }
    });
    
    // Handle dropdown menus
    const dropdowns = document.querySelectorAll(".nav-item.dropdown");
    
    dropdowns.forEach(dropdown => {
        const link = dropdown.querySelector(".nav-link");
        const menu = dropdown.querySelector(".dropdown-menu");
        
        // For mobile: toggle dropdown on click
        if (window.innerWidth <= 768 && link && menu) {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                menu.style.display = menu.style.display === "block" ? "none" : "block";
            });
        }
    });
    
    // For desktop: handle hover states
    if (window.innerWidth > 768) {
        dropdowns.forEach(dropdown => {
            dropdown.addEventListener("mouseenter", () => {
                dropdown.classList.add("dropdown");
            });
            
            dropdown.addEventListener("mouseleave", () => {
                dropdown.classList.remove("dropdown");
            });
        });
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === "#") return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (navMenu && navMenu.classList.contains("active")) {
                    navMenu.classList.remove("active");
                    if (menuToggle) {
                        menuToggle.classList.remove("active");
                    }
                }
            }
        });
    });
    
    // Intersection Observer for animations
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.feature-card, .detail-card, .eligibility-card');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });
        
        elements.forEach(element => {
            element.style.opacity = "0";
            element.style.transform = "translateY(20px)";
            element.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            observer.observe(element);
        });
    };
    
    // Initialize animations
    animateOnScroll();
});

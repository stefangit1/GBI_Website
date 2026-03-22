document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.querySelector(".nav_menu_button");
    const navDropdown = document.querySelector(".nav_dropdown");

    menuButton.addEventListener("click", function() {
        navDropdown.classList.toggle("active");
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        question.addEventListener('click', () => {
            const answer = item.querySelector('.faq-answer');

            if (answer.style.maxHeight) {
                answer.style.maxHeight = null;
            } else {
                faqItems.forEach(i => i.querySelector('.faq-answer').style.maxHeight = null); // Close other answers
                answer.style.maxHeight = answer.scrollHeight + 'px';
            }
        });
    });
});
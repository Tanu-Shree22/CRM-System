const faqs = document.getElementsByClassName(".faq");
 faqs.forEach((faq) => {
     faq.addEventListener("click", () => {
         faq.classList.toggle("active");
     });
 });
// Highlight menu aktif
document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll("header a");
    const currentPage = window.location.pathname.split("/").pop();

    links.forEach(link => {
        if (link.getAttribute("href") === currentPage) {
            link.style.borderBottom = "2px solid #ffe082";
        }
    });
});

// Back to top button
const backToTop = document.createElement("button");
backToTop.innerText = "⬆";
backToTop.style.position = "fixed";
backToTop.style.bottom = "20px";
backToTop.style.right = "20px";
backToTop.style.padding = "10px 15px";
backToTop.style.border = "none";
backToTop.style.borderRadius = "50%";
backToTop.style.fontSize = "18px";
backToTop.style.cursor = "pointer";
backToTop.style.display = "none";
backToTop.style.backgroundColor = "#0066cc";
backToTop.style.color = "white";
backToTop.style.boxShadow = "0 4px 8px rgba(0,0,0,0.2)";
document.body.appendChild(backToTop);

window.addEventListener("scroll", () => {
    if (window.scrollY > 200) {
        backToTop.style.display = "block";
    } else {
        backToTop.style.display = "none";
    }
});

backToTop.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
});


// Membuat observer untuk mendeteksi elemen yang muncul di layar
const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Tambahkan class 'active' ketika elemen terlihat di layar
            entry.target.classList.add('active');
            observer.unobserve(entry.target); // Menghentikan observasi pada elemen ini setelah terlihat
        }
    });
}, { threshold: 0.5 }); // Mengatur threshold agar elemen terlihat 50% sebelum aktif

// Pilih semua elemen dengan kelas 'reveal'
const revealElements = document.querySelectorAll('.reveal');
revealElements.forEach(element => {
    observer.observe(element); // Mulai mengamati elemen-elemen tersebut
});

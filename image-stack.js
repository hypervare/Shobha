// document.addEventListener("DOMContentLoaded", () => {

//   const imagePart = document.querySelector(".image-part");
//   const firstImage = document.querySelector(".image-primary");

//   if (!imagePart || !firstImage) return;

  
//   firstImage.style.backgroundImage =
//     "url('https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=800&q=80')";

 
//   setTimeout(() => {
//     firstImage.classList.add("show");
//   }, 100);

  
//   setTimeout(() => {
//     const secondImage = document.createElement("div");
//     secondImage.className = "imageis second";

//     secondImage.style.backgroundImage =
//       "url('https://images.unsplash.com/photo-1493809842364-78817add7ffb?auto=format&fit=crop&w=800&q=80')";

//     imagePart.appendChild(secondImage);

   
//     secondImage.offsetHeight;

//     secondImage.classList.add("show");
//   }, 2000);

// });























document.addEventListener("DOMContentLoaded", () => {

  /* ===============================
     1. NAVBAR / HAMBURGER
  =============================== */
  const hamburger = document.getElementById("hamburger");
  const mobileMenu = document.getElementById("mobileMenu");

  if (hamburger && mobileMenu) {
    hamburger.addEventListener("click", () => {
      mobileMenu.classList.toggle("show");
    });
  }

  /* ===============================
     2. HERO REVEAL
  =============================== */
  const reveal = document.querySelector(".lux-reveal");
  const heroContent = document.querySelector(".lux-content");

  if (reveal && heroContent) {
    reveal.animate(
      [{ transform: "translateY(0%)" }, { transform: "translateY(100%)" }],
      { duration: 1400, easing: "cubic-bezier(0.22,1,0.36,1)", fill: "forwards" }
    );

    setTimeout(() => {
      heroContent.animate(
        [{ opacity: 0, transform: "translateY(-20px)" },
         { opacity: 1, transform: "translateY(0)" }],
        { duration: 900, easing: "cubic-bezier(0.22,1,0.36,1)", fill: "forwards" }
      );
    }, 700);
  }

  /* ===============================
     3. STATS COUNTER
  =============================== */
  const counters = document.querySelectorAll(".stat-card h1");

  if (counters.length) {
    const animate = (el) => {
      const target = parseInt(el.innerText.replace(/\D/g, ""));
      const suffix = el.innerText.replace(/[0-9]/g, "");
      let start = 0;
      const startTime = performance.now();

      function update(now) {
        const progress = Math.min((now - startTime) / 1200, 1);
        el.innerText = Math.floor(progress * target) + suffix;
        if (progress < 1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update);
    };

    const observer = new IntersectionObserver(entries => {
      entries.forEach(e => {
        if (e.isIntersecting) {
          animate(e.target);
          observer.unobserve(e.target);
        }
      });
    }, { threshold: 0.4 });

    counters.forEach(c => observer.observe(c));
  }

  /* ===============================
     4. SECTION-2 SCROLL SLIDER
  =============================== */
  const section2 = document.getElementById("luxurySection");
  const bgTrack = document.getElementById("sec2Bg");

  if (section2 && bgTrack) {
    const slides = [
      {
        title: "Luxury Villa Sales",
        desc: "Handpicked villas in premium locations.",
        img: "./assets/B2.webp"
      },
      {
        title: "Bespoke Interiors",
        desc: "Tailored interior experiences.",
        img: "./assets/About.webp"
      },
      {
        title: "Modern Living",
        desc: "Smart spaces for refined lifestyles.",
        img: "./assets/img105.jpg"
      }
      
    ];

    const titleEl = document.getElementById("sec2Title");
    const descEl = document.getElementById("sec2Desc");
    const imgEl = document.getElementById("sec2Img");
    const countEl = document.getElementById("sec2Count");

    let last = -1;

    window.addEventListener("scroll", () => {
      const rect = section2.getBoundingClientRect();
      const total = section2.offsetHeight - innerHeight;
      if (rect.top > 0 || rect.bottom < innerHeight) return;

      const progress = Math.min(Math.max(-rect.top / total, 0), 0.99);
      const index = Math.floor(progress * slides.length);

      if (index !== last) {
        last = index;
        bgTrack.style.transform = `translateX(-${index * 100}vw)`;
        titleEl.textContent = slides[index].title;
        descEl.textContent = slides[index].desc;
        imgEl.src = slides[index].img;
        countEl.textContent = `0${index + 1} — 03`;
      }
    });
  }

  /* ===============================
     5. RAIL HORIZONTAL SCROLL
  =============================== */
  const railLine = document.getElementById("rail-line");
  const railWrapper = document.querySelector(".rail-wrapper");

  if (railLine && railWrapper) {
    window.addEventListener("scroll", () => {
      if (innerWidth < 508) return;
      const rect = railWrapper.getBoundingClientRect();
      const progress = Math.min(Math.max(-rect.top /(0.4*rect.height), 0), 1);
      const max = railLine.scrollWidth - innerWidth;
      railLine.style.transform = `translateX(-${progress * max}px)`;
    });
  }

  /* ===============================
     6. WORD TRAIN
  =============================== */
  const wordTrain = document.getElementById("wordTrain");
  if (wordTrain) {
    const words = wordTrain.innerText.split(" ");
    wordTrain.innerHTML = "";
    const spans = words.map(w => {
      const s = document.createElement("span");
      s.textContent = w + " ";
      wordTrain.appendChild(s);
      return s;
    });

    let last = scrollY;
    addEventListener("scroll", () => {
      const down = scrollY > last;
      last = scrollY;
      spans.forEach((s, i) => {
        s.style.transform = down ? `translateX(${(spans.length - i) * 6}px)` : "none";
      });
    });
  }

  /* ===============================
     7. VILLA AUTO SLIDER
  =============================== */
  const villas = [
    {
      title:"SOBHA 63A – 3 BHK",
      location:"Golf Course Ext Rd, Gurgaon",
      tagline:"Luxury for families",
      desc:"2300 sq.ft premium homes.",
      img:"./assets/floorplan2.png",
      thumb:"https://images.unsplash.com/photo-1599423300746-b62533397364"
    },
    {
      title:"SOBHA 63A – 4 BHK",
      location:"Sector 63A",
      tagline:"Elite low-density living",
      desc:"2700 sq.ft residences.",
      img:"./assets/floorplan1.jpg",
      thumb:"./assets/floorplan1.jpg"
    },
    {
      title:"SOBHA 63A – 3 BHK",
      location:"Golf Course Ext Rd, Gurgaon",
      tagline:"Luxury for families",
      desc:"2300 sq.ft premium homes.",
      img:"./assets/floorplan5.png",
      thumb:"https://images.unsplash.com/photo-1599423300746-b62533397364"
    },

  ];

  const mainImg = document.getElementById("mainImg");
  const thumbImg = document.getElementById("thumbImg");
  const title = document.getElementById("villaTitle");
  const loc = document.getElementById("villaLocation");
  const tag = document.getElementById("villaTagline");
  const desc = document.getElementById("villaDesc");
  const num = document.getElementById("villaIndex");

  if (mainImg) {
    let i = 0;
    const render = () => {
      const v = villas[i];
      mainImg.src = v.img;
      thumbImg.src = v.thumb;
      title.textContent = v.title;
      loc.textContent = v.location;
      tag.textContent = v.tagline;
      desc.textContent = v.desc;
      num.textContent = String(i + 1).padStart(2, "0");
    };
    render();
    setInterval(() => {
      i = (i + 1) % villas.length;
      render();
    }, 3500);
  }

  /* ===============================
     8. ART CLUSTER
  =============================== */
  const art = document.getElementById("artCluster");
  if (art) {
    new IntersectionObserver(entries => {
      entries.forEach(e => {
        art.classList.toggle("active", e.isIntersecting);
      });
    }, { threshold: 0.45 }).observe(art);
  }

  /* ===============================
     9. POPUP FORM
  =============================== */
  const overlay = document.getElementById("popupOverlay");
  const openBtns = document.querySelectorAll(".open-form-btn");
  const closeBtn = overlay?.querySelector(".close-btn");

  if (overlay) {
    const open = () => overlay.classList.add("active");
    const close = () => overlay.classList.remove("active");

    setTimeout(open, 3000);
    openBtns.forEach(b => b.addEventListener("click", open));
    closeBtn?.addEventListener("click", close);
    overlay.addEventListener("click", e => {
      if (e.target === overlay) close();
    });
  }




  /* ===============================
   10. TESTIMONIAL / COMMENT SLIDER
=============================== */
const trustTrack = document.getElementById("trustTrack");
const trustCards = document.querySelectorAll(".trust-card");
const trustPrev = document.getElementById("trustPrev");
const trustNext = document.getElementById("trustNext");

if (trustTrack && trustCards.length) {
  let index = 0;
  let visible = window.innerWidth <= 900 ? 1 : 2;
  const gap = 32;

  function updateTrust() {
    const cardWidth = trustCards[0].offsetWidth + gap;
    trustTrack.style.transform = `translateX(-${index * cardWidth}px)`;
  }

  trustNext?.addEventListener("click", () => {
    index = index < trustCards.length - visible ? index + 1 : 0;
    updateTrust();
  });

  trustPrev?.addEventListener("click", () => {
    index = index > 0 ? index - 1 : trustCards.length - visible;
    updateTrust();
  });

  // 🔁 auto slide
  let auto = setInterval(() => trustNext?.click(), 4500);

  trustTrack.addEventListener("mouseenter", () => clearInterval(auto));
  trustTrack.addEventListener("mouseleave", () => {
    auto = setInterval(() => trustNext?.click(), 4500);
  });

  window.addEventListener("resize", () => {
    visible = window.innerWidth <= 900 ? 1 : 2;
    updateTrust();
  });

  updateTrust();
}












/* ===============================
   IMAGE MULTIPLIER (1 → 2)
=============================== */
const imagePart = document.querySelector(".image-part");
const firstImage = document.querySelector(".image-primary");

if (imagePart && firstImage) {

  // set first image
  firstImage.style.backgroundImage =
    "url('https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1200&q=80')";

  // show first image
  setTimeout(() => {
    firstImage.classList.add("show");
  }, 100);

  // create & show second image after 2s
  setTimeout(() => {
    const secondImage = document.createElement("div");
    secondImage.className = "imageis second";

    secondImage.style.backgroundImage =
      "url('https://images.unsplash.com/photo-1493809842364-78817add7ffb?auto=format&fit=crop&w=1200&q=80')";

    imagePart.appendChild(secondImage);

    // force reflow
    secondImage.offsetHeight;

    secondImage.classList.add("show");
  }, 2000);
}
});
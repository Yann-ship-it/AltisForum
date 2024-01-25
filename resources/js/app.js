import './bootstrap';

import Alpine from 'alpinejs';
import './bootstrap';
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin.min.css';
import 'tinymce/skins/content/default/content.min.css';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';


document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector(".main-slider");
    const sliderWrapper = slider.querySelector(".aol-slide");
    const slides = sliderWrapper.querySelectorAll(".slide");
    const pagination = slider.querySelector(".pagination");
    
  
    let currentIndex = 0;
  
    function updateSlider() {
      slides.forEach((slide, index) => {
        if (index === currentIndex) {
          slide.style.display = "block";
        } else {
          slide.style.display = "none";
        }
      });
  
      updatePagination();
    }
  
    function updatePagination() {
      pagination.innerHTML = "";
      slides.forEach((_, index) => {
        const dot = document.createElement("span");
        dot.className = "dot";
        dot.addEventListener("click", function() {
          currentIndex = index;
          updateSlider();
        });
        if (index === currentIndex) {
          dot.classList.add("active");
        }
        pagination.appendChild(dot);
      });
    }
  
    updateSlider();
  });


window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: 'textarea',
        plugins: 'autoresize',
        autoresize_bottom_margin: 16,
        autoresize_max_height: 400,
        autoresize_min_height: 100,
        valid_elements: '*[*]', // Autorise toutes les balises et tous les attributs
        valid_children: '+body[style]', // Autorise les éléments enfants dans le corps avec l'attribut "style"/
        skin: 'vendor/tinymce/tinymce/skins/content/dark',
    });
});

// Alpine
window.Alpine = Alpine;

Alpine.start();

// // Bouton upload img
// const fileInput = document.getElementById('fileInput');
// const fileIcon = document.getElementById('fileIcon');

// fileInput.addEventListener('change', function() {
//     if (fileInput.files.length > 0) {
//         fileIcon.style.color = 'green';
//     } else {
//         fileIcon.style.color = 'red';
//     }
// });


// Trie du tableau
function sortTableByAttribute(attribute) {
    const tbody = document.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    rows.sort((a, b) => {
        const aValue = a.querySelector(`[data-sort="${attribute}"]`).textContent;
        const bValue = b.querySelector(`[data-sort="${attribute}"]`).textContent;

        if (attribute === "id") {
            return parseInt(aValue) - parseInt(bValue);
        } else {
            return aValue.localeCompare(bValue);
        }
    });

    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
    }

    rows.forEach(row => {
        tbody.appendChild(row);
    });
}

// // Modifier role sans bouton submit
// const select = document.getElementById('change-status');
// select.addEventListener('change', () => {
//     const attribute = select.value;
//     sortTableByAttribute(attribute);
// });

// document.addEventListener('DOMContentLoaded', function() {
//     const forms = document.querySelectorAll('[id^="user-update-form-"]');

//     forms.forEach(form => {
//         const select = form.querySelector('select[name="role"]');
//         const userId = form.id.split('-').pop();

//         if (select) {
//             select.addEventListener('change', function() {
//                 console.log(`User ${userId} - Role changed to ${select.value}`);
//                 form.submit();
//             });
//         } else {
//             console.error(`Select not found in form for User ${userId}`);
//         }
//     });
// });

// Search bar user adminboard
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const tbody = document.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.trim().toLowerCase();

        rows.forEach(row => {
            const usernameCell = row.querySelector('[data-sort="user"]');
            if (usernameCell) {
                const username = usernameCell.textContent.toLowerCase();
                if (username.includes(searchTerm)) {
                    row.style.display = ''; // Afficher la ligne
                } else {
                    row.style.display = 'none'; // Masquer la ligne
                }
            }
        });
    });
});



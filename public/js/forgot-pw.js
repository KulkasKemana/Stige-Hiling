const form = document.getElementById('resetForm');
      const popup = document.getElementById('popup');
      const popupContent = document.getElementById('popupContent');

      form.addEventListener('submit', function (e) {
        e.preventDefault();

        popup.classList.remove('hidden');

        setTimeout(() => {
          popupContent.classList.remove('opacity-0', 'scale-95');
          popupContent.classList.add('opacity-100', 'scale-100');
        }, 50);

        setTimeout(() => {
          popupContent.classList.remove('opacity-100', 'scale-100');
          popupContent.classList.add('opacity-0', 'scale-95');
          setTimeout(() => {
            popup.classList.add('hidden');
          }, 300);
        }, 3000);
      });
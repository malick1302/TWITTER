
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanels = document.querySelectorAll('.tab-panel');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            tabButtons.forEach(button => button.classList.remove('bg-gray-300', 'dark:bg-slate-900'));
            button.classList.add('bg-gray-300', 'dark:bg-slate-900');

            tabPanels.forEach(panel => panel.classList.add('hidden'));
            
            const targetTab = button.getAttribute('data-tab');
            const activePanel = document.getElementById(targetTab);
            activePanel.classList.remove('hidden');
        });
    });

    document.querySelector('.tab-button').click();

   
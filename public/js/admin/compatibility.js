document.addEventListener('DOMContentLoaded', function () {
    console.log('Compatibility JS loaded');

    // === Модалка "Добавить" ===
    const openModalBtn = document.getElementById('openModal');
    const modal = document.getElementById('modal');
    const closeModalBtn = modal?.querySelector('.close');

    if (openModalBtn && modal) {
        openModalBtn.addEventListener('click', () => {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            setTimeout(() => modal.classList.add('active'), 10);
        });
    }

    if (closeModalBtn && modal) {
        closeModalBtn.addEventListener('click', () => {
            modal.classList.remove('active');
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }, 300);
        });
    }

    // === Модалка "Экспорт" ===
    const openExportBtn = document.getElementById('openExportModal');
    const exportModal = document.getElementById('exportModal');
    const closeExportBtn = exportModal?.querySelector('.close-export');

    if (openExportBtn && exportModal) {
        openExportBtn.addEventListener('click', () => {
            exportModal.style.display = 'flex';
            exportModal.classList.add('active');
        });
    }

    if (closeExportBtn && exportModal) {
        closeExportBtn.addEventListener('click', () => {
            exportModal.classList.remove('active');
            setTimeout(() => exportModal.style.display = 'none', 300);
        });
    }

    // === Функция удаления полей картриджей ===
    function attachRemoveHandlers(container) {
        container?.querySelectorAll('.remove-cartridge-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const row = btn.closest('.cartridge-input-row');
                if (row) row.remove();
            });
        });
    }

    // === Добавление поля "Картридж" в модалке "Добавить" ===
    const addCartridgeBtn = document.getElementById('addCartridgeField');
    const cartridgeFields = document.getElementById('cartridgeFields');

    if (addCartridgeBtn && cartridgeFields) {
        attachRemoveHandlers(cartridgeFields);
        addCartridgeBtn.addEventListener('click', () => {
            cartridgeFields.insertAdjacentHTML('beforeend', `
                <div class="cartridge-input-row">
                    <input type="text" name="cartridge_names[]" placeholder="Картридж" required>
                    <button type="button" class="remove-cartridge-btn" title="Удалить">&times;</button>
                </div>
            `);
            attachRemoveHandlers(cartridgeFields);
        });
    }

    // === Редактирование ===
    const editModal = document.getElementById('editModal');
    const closeEditBtn = editModal?.querySelector('.close-edit');
    const addEditCartridgeBtn = document.getElementById('addEditCartridgeField');
    const editCartridgeFields = document.getElementById('editCartridgeFields');

    // Закрытие модалки редактирования
    if (closeEditBtn && editModal) {
        closeEditBtn.addEventListener('click', () => {
            editModal.classList.remove('active');
            setTimeout(() => editModal.style.display = 'none', 300);
        });
    }

    // Обработка кнопок "Изменить"
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            const printer = btn.dataset.printer;
            const row = btn.closest('tr');
            const cartridgesText = row.querySelector('.cartridges-cell').textContent;
            const cartridges = cartridgesText.split(/\s+/).filter(c => c.trim() !== '');

            document.getElementById('oldPrinterName').value = printer;
            document.getElementById('editPrinterName').value = printer;

            const fieldsContainer = document.getElementById('editCartridgeFields');
            if (fieldsContainer) {
                fieldsContainer.innerHTML = cartridges.map(c => `
                    <div class="cartridge-input-row">
                        <input type="text" name="edit_cartridge_names[]" value="${c}" required>
                        <button type="button" class="remove-cartridge-btn">&times;</button>
                    </div>
                `).join('');
                attachRemoveHandlers(fieldsContainer);
            }

            if (editModal) {
                editModal.style.display = 'flex';
                editModal.classList.add('active');
            }
        });
    });

    // Добавление картриджей в модалке редактирования
    if (addEditCartridgeBtn && editCartridgeFields) {
        addEditCartridgeBtn.addEventListener('click', () => {
            editCartridgeFields.insertAdjacentHTML('beforeend', `
                <div class="cartridge-input-row">
                    <input type="text" name="edit_cartridge_names[]" placeholder="Картридж" required>
                    <button type="button" class="remove-cartridge-btn">&times;</button>
                </div>
            `);
            attachRemoveHandlers(editCartridgeFields);
        });
    }

    // === Поиск ===
    const filterPrinter = document.getElementById('filterPrinter');
    const filterCartridge = document.getElementById('filterCartridge');
    const tbody = document.querySelector('.table-wrapper tbody');

    function filterTable() {
        if (!tbody) return;
        const rows = tbody.querySelectorAll('tr');
        const printerValue = filterPrinter?.value.toLowerCase() || '';
        const cartridgeValue = filterCartridge?.value.toLowerCase() || '';

        rows.forEach(row => {
            const printerCell = row.cells[0]?.textContent.toLowerCase() || '';
            const cartridgeCell = row.cells[1]?.textContent.toLowerCase() || '';

            const show = (!printerValue || printerCell.includes(printerValue)) &&
                         (!cartridgeValue || cartridgeCell.includes(cartridgeValue));

            row.style.display = show ? '' : 'none';
        });
    }

    if (filterPrinter) filterPrinter.addEventListener('input', filterTable);
    if (filterCartridge) filterCartridge.addEventListener('input', filterTable);

    // Закрытие модалок по клику вне
    [modal, editModal, exportModal].forEach(m => {
        if (m) {
            m.addEventListener('click', (e) => {
                if (e.target === m) {
                    m.classList.remove('active');
                    setTimeout(() => m.style.display = 'none', 300);
                }
            });
        }
    });
});
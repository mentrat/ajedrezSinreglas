document.addEventListener('DOMContentLoaded', () => {
    const piezas = document.querySelectorAll('.pieza');
    const celdas = document.querySelectorAll('td');
    let piezaArrastrada = null;

    piezas.forEach(pieza => {
        pieza.setAttribute('draggable', 'true');
        pieza.addEventListener('dragstart', dragStart);
        pieza.addEventListener('dragend', dragEnd);
    });

    celdas.forEach(celda => {
        celda.addEventListener('dragover', dragOver);
        celda.addEventListener('drop', drop);
    });

    function dragStart(e) {
        piezaArrastrada = e.target;
        e.dataTransfer.setData('text/plain', e.target.outerHTML);
        setTimeout(() => {
            e.target.classList.add('moviendo');
        }, 0);
    }

    function dragEnd(e) {
        e.target.classList.remove('moviendo');
    }

    function dragOver(e) {
        e.preventDefault();
    }

    function drop(e) {
        e.preventDefault();
        if (!piezaArrastrada) return;

        const celdaDestino = e.target.closest('td');
        if (!celdaDestino) return;

        // Eliminar la pieza de su posición original
        piezaArrastrada.parentNode.removeChild(piezaArrastrada);

        // Eliminar cualquier pieza existente en la celda de destino
        while (celdaDestino.firstChild) {
            celdaDestino.removeChild(celdaDestino.firstChild);
        }

        // Mover la pieza a la nueva celda
        celdaDestino.appendChild(piezaArrastrada);

        // Restablecer la variable piezaArrastrada
        piezaArrastrada = null;
    }

    // Función para reiniciar los event listeners
    function reiniciarEventListeners() {
        document.querySelectorAll('.pieza').forEach(pieza => {
            pieza.setAttribute('draggable', 'true');
            pieza.removeEventListener('dragstart', dragStart);
            pieza.removeEventListener('dragend', dragEnd);
            pieza.addEventListener('dragstart', dragStart);
            pieza.addEventListener('dragend', dragEnd);
        });
    }

    // Llamar a reiniciarEventListeners después de cada movimiento
    celdas.forEach(celda => {
        celda.addEventListener('drop', () => {
            setTimeout(reiniciarEventListeners, 0);
        });
    });
});

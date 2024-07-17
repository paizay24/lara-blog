import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';
import Swal from 'sweetalert2';


window.showToast = function(message) {
    console.log('san kyi tar par');

    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    Toast.fire({
        icon: 'success',
        title: message
    });
}



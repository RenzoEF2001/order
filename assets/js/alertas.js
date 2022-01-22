let botoneditar = document.getElementById('btneditar');


botoneditar.addEventListener('click', e=>{

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Datos actualizados correctamente',
            showConfirmButton: false,
            timer: 1500
          })



});

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <input type="text" name="input" id="input">
    </form>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">
        <i class="fa-sharp fa-solid fa-plus"></i> Agregar cuota
    </button>
    <table class="table table-striped">
        <thead>
            <th>DNI</th>
            <th>ULTIMA MODIFICACION</th>
            <th>TOTAL</th>
            <th></th>
            <th></th>
        </thead>
        <tbody id="content">

        </tbody>
    </table>

    <div class="modal fade modal-lg" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <th>ASUNTO</th>
                            <th>CUOTA</th>
                            <th>FECHA</th>
                        </thead>
                        <tbody id='verCuotasContent'>
                           
                        </tbody >
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-lg" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id='genCuota'>
                        <input type="text" value='genCuota' id="flagGenCuota" hidden>
                        <!--  <select class="form-select form-select-sm" aria-label=".form-select-sm example" name='modal_tipoCuota' id='modal_tipoCuota' onchange='tipoCuota()'>
                            <option value="Cuota" selected>Cuota</option>
                            <option value="Deuda">Deuda</option>
                        </select> -->
                        <div name='cuotaBox' id='cuotaBox'>
                            <label for="modal_idActa">NUMERO DE ACTA</label>
                            <input type="number" name="modal_idActa" id="modal_idActa">
                        </div>
                        <!-- <div name='deudaBox' id='deudaBox' style="display:none">
                            <label for="modal_idPoblador">DNI POBLADOR</label>
                            <input type="text" name="modal_idPoblador" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="modal_idPoblador" maxlength="8" minlength="8">
                        </div> -->
                        <label for="modal_nuevoMonto">MONTO: </label>
                        <input type="number" name='modal_nuevoMonto' id='modal_nuevoMonto'>
                        <!-- <label for="modal_fechaPago">FECHA DE PAGO: </label>
                        <input type="datetime-local" name='modal_fechaPago' id='modal_fechaPago' onchange="fechaMinima()"> -->
                        <label for="modal_descripcion">DESCRIPCION: </label>
                        <textarea id='modal_descripcion' name='modal_descripcion'></textarea>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="generarCuota()">Generar Cuota</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" id='pagaForm'>
                        <label for="modal_dni">DNI: </label>
                        <input type="text" name='modal_dni' id='modal_dni' readonly>
                        <label for="modal_nombre">ULTIMA MODIFICACION: </label>
                        <input type="text" name='modal_nombre' id='modal_nombre' readonly>
                        <label for="modal_monto">TOTAL: </label>
                        <input type="text" name='modal_monto' id='modal_monto' readonly>
                        <label for="modal_montoPagar">MONTO A PAGAR: </label>
                        <input type="number" name='modal_montoPagar' id='modal_montoPagar'>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick='paga()'>Aplicar</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
       /*  function fechaMinima() {
            var UserDate = document.getElementById("modal_fechaPago").value;
            var ToDate = new Date();
            console.log(ToDate.toISOString());
            if (new Date(UserDate).toISOString() <= ToDate.toISOString()) {
                alert("La fecha debe ser mayor a (actual): " + ToDate);
                return false;
            }
            return true;
        } */

        /* function tipoCuota() {
            modal_tipoCuota = document.getElementById('modal_tipoCuota')
            cuotaBox = document.getElementById('cuotaBox')
            deudaBox = document.getElementById('deudaBox')
            if (modal_tipoCuota.value == 'Cuota') {
                cuotaBox.style.display = '';
                deudaBox.style.display = 'none';
            } else {
                deudaBox.style.display = '';
                cuotaBox.style.display = 'none';
            }
        } */
    </script>

    <script>
        var deuda = {
            dni: '',
            nombre: '',
            monto: '',

        }

        function edit(dniClass) {

            let data = document.getElementsByClassName(dniClass);
            let modal_dni = document.getElementById('modal_dni')
            let modal_nombre = document.getElementById('modal_nombre')
            let modal_monto = document.getElementById('modal_monto')
            let modal_montoPagar = document.getElementById('modal_montoPagar')

            deuda = {
                dni: data[0].cells[0].textContent,
                nombre: data[0].cells[1].textContent,
                monto: data[0].cells[2].textContent,

            }
            modal_dni.value = deuda.dni
            modal_nombre.value = deuda.nombre
            modal_monto.value = deuda.monto

        }

        function paga() {
            var pagaForm = document.getElementById('pagaForm')
            var data = new FormData(pagaForm)
            let modal_dni = document.getElementById('modal_dni')
            let modal_nombre = document.getElementById('modal_nombre')
            let modal_monto = document.getElementById('modal_monto')
            let modal_montoPagar = document.getElementById('modal_montoPagar')
            let var1 = parseFloat(modal_monto.value.replace(',', '.'))
            let var2 = parseFloat(modal_montoPagar.value.replace(',', '.'))
            if (modal_montoPagar.value.length != 0 && var1 >= var2 && modal_monto.value != 0) {
                fetch('../modelo/modulo_DeudasM.php', {
                    method: 'POST',
                    body: data
                }).then(res => res.json()).then(data => {
                    console.log(data)
                })
            } else {
                alert('Ingrese un monto valido')
            }
        }

        function generarCuota() {
            let genCuota = document.getElementById('genCuota');
            let data = new FormData(genCuota);
            let nuevoMonto = document.getElementById('modal_nuevoMonto')
            if (nuevoMonto.value.length != 0) {
               
                    fetch('../modelo/modulo_DeudasM.php', {
                        method: 'POST',
                        body: data
                    }).then(res => res.json()).then(data => {
                        console.log(data);
                    })
                
            } else {
                alert('Ingrese un monto valido');
            }
        }

        function verCuotas() {
            let verCuota = document.getElementById('verCuota');
            let data = new FormData(verCuota);
            let content= document.getElementById('verCuotasContent');
            fetch('../controlador/modalVerCuota.php', {
                method: 'POST',
                body: data
            }).then(res => res.json()).then(data => {
                content.innerHTML=data;
            })
        }
    </script>

    <script src="../js/busquedaDeudas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
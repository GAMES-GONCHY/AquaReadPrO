/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 5
Version: 5.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/
*/
/*
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 5
Version: 5.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin/
*/
var handleDataTableCombinationSetting = function() {
    "use strict";

    var initDataTable = function(tableId) {
        if ($(tableId).length !== 0) {
            var options = {
                dom: '<"dataTables_wrapper dt-bootstrap"<"row"<"col-xl-7 d-block d-sm-flex d-xl-block justify-content-center"<"d-block d-lg-inline-flex me-0 me-md-3"l><"d-block d-lg-inline-flex"B>><"col-xl-5 d-flex d-xl-block justify-content-center"fr>>t<"row"<"col-md-5"i><"col-md-7"p>>>',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        className: 'btn-sm',
                        customize: function(doc) {
                            // Cambiar el título del PDF
                            doc.content.splice(0, 1, {
                                text: 'Historial de pagos', // Cambia este texto al título que desees
                                fontSize: 16, // Tamaño de la fuente del título
                                alignment: 'center', // Alineación del título
                                margin: [0, 0, 0, 12] // Márgenes del título (arriba, derecha, abajo, izquierda)
                            });

                            // Recalcula la numeración de las filas en el PDF
                            var rowCount = 1;
                            doc.content[1].table.body.forEach(function(row, i) {
                                // Aplica solo a las filas de datos, no a los encabezados
                                if (i > 0) {
                                    row[0].text = rowCount; // Asigna la numeración dinámica
                                    rowCount++;
                                }
                            });

                            // Añadir pie de página en todas las páginas del PDF
                            doc['footer'] = function(currentPage, pageCount) {
                                return {
                                    text: 'Página ' + currentPage.toString() + ' de ' + pageCount.toString(),
                                    alignment: 'center',
                                    fontSize: 10,
                                    margin: [0, 0, 0, 20] // Márgenes del pie de página
                                };
                            };
                        },
                        exportOptions: {
                            // Excluir la última columna (índice 7 si es la octava columna)
                            columns: ':not(:last-child)'
                        }
                    },
                    { 
                        extend: 'copy', 
                        className: 'btn-sm',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    { 
                        extend: 'csv', 
                        className: 'btn-sm',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    { 
                        extend: 'excel', 
                        className: 'btn-sm',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    },
                    { 
                        extend: 'print', 
                        className: 'btn-sm',
                        exportOptions: {
                            columns: ':not(:last-child)'
                        }
                    }
                ],
                responsive: true,
                colReorder: true,
                scrollX: false,
                autoWidth: false, 
                keys: true,
                rowReorder: false,
                select: true,
                "columnDefs": [
                    { 
                        "targets": 0, // Aplica solo a la primera columna (numeración)
                        "orderable": false // Evitar que la columna sea ordenable
                    }
                ],
                "order": [[ 1, 'asc' ]] // Orden por la segunda columna (por ejemplo, Código de socio)
            };

            if ($(window).width() <= 1500) {
                options.rowReorder = false;
                options.colReorder = false;
            }

            // Inicializa la tabla con las opciones
            var table = $(tableId).DataTable(options);

            // Recalcular la numeración al dibujar la tabla
            table.on('order.dt search.dt draw.dt', function() {
                table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1; // Recalcula la numeración
                });
            }).draw();

            return table;
        }
        return null;
    };

    // Inicializa las tablas según el ID correspondiente
    window.tablaPendientes = initDataTable('#pendientes');  
    window.tablaPagados = initDataTable('#pagados');    
    window.tablaVencidos = initDataTable('#vencidos');   
};

var TableManageCombine = function () {
    "use strict";
    return {
        init: function () {
            handleDataTableCombinationSetting();
        }
    };
}();

$(document).ready(function () {
    // Inicializa las tablas cuando el documento esté listo
    TableManageCombine.init();
});

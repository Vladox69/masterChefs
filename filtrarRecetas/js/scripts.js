$(document).ready(function () {
    alert('holi.. Estas seguro de actualizar la pagina?');
    //agregar la clase active al primer enlace
    $(' .category_list .categor_item[category="all"]').addClass('ct_item-active');

    $(' .categor_item').click(function () {

         //filtrando categorias

         var catProdcut = $(this).attr('category');
         console.log(catProdcut);
 
         //agregando clases active al boton seleccionado
         $(' .categor_item').removeClass('ct_item-active');
         $(this).addClass('ct_item-active');
 
         // filtrar sin efectos- ocultado products
         //ocultando productos -hide()
 
         $('.recet-item').css('transform', 'scale(0)');
         function hideProduct() {
             $('.recet-item').hide();
         } setTimeout(hideProduct, 400);
 
 
 
         // mostrar productos - show()
 
         function showProduct() {
             $(' .recet-item[category="' + catProdcut + '"]').show();
             $(' .recet-item[category="' + catProdcut + '"]').css('transform', 'scale(1)');
 
         } setTimeout(showProduct, 400);
 
    });
});
<?php

header('Access-Control-Allow-Origin: *');

$productos = [
    [
        "id" => 1,
        "nombre" => "Camiseta básica",
        "descripcion" => "Camiseta de algodón 100% en varios colores.",
        "precio" => 12.99,
        "img" => "https://publimitos.com/Tienda/5950-large_default/camiseta-basica-personalizable.jpg",
        "categoria" => "Ropa"
    ],
    [
        "id" => 2,
        "nombre" => "Pantalón vaquero",
        "descripcion" => "Pantalón de mezclilla azul clásico.",
        "precio" => 29.95,
        "img" => "https://hazelnut.es/wp-content/uploads/2024/07/6y80y9gs9_g.jpg",
        "categoria" => "Ropa"
    ],
    [
        "id" => 3,
        "nombre" => "Zapatillas deportivas",
        "descripcion" => "Zapatillas ligeras y cómodas para el día a día.",
        "precio" => 45.50,
        "img" => "https://www.hola.com/horizon/square/096b0bc15b3c-depor-t.jpg",
        "categoria" => "Calzado"
    ],
    [
        "id" => 4,
        "nombre" => "Sudadera básica",
        "descripcion" => "Sudadera básica para el dia a dia.",
        "precio" => 60.50,
        "img" => "https://www.camisetasymoda.es/26185-large_default/sudadera-basica-con-capucha-hombre-de-gildan.jpg",
        "categoria" => "Ropa"
    ],
    [
        "id" => 5,
        "nombre" => "Chaqueta acolchada",
        "descripcion" => "Chaqueta acolchada para el frio.",
        "precio" => 100,
        "img" => "https://shop.iturri.com/20290-large_default/chaqueta-acolchada-impermeable-azul-marino-jg300u-unisex.jpg",
        "categoria" => "Ropa"
    ],
    [
        "id" => 6,
        "nombre" => "Calcetines termicos",
        "descripcion" => "Calcetines termicos para el frio.",
        "precio" => 15,
        "img" => "https://entaban.es/15042-product_default/calcetines-termicos-j-hayber-therm.jpg",
        "categoria" => "Ropa"
    ],
    [
        "id" => 7,
        "nombre" => "Botas de montaña",
        "descripcion" => "Botas de montaña para el monte.",
        "precio" => 150,
        "img" => "https://peralimonerashop.com/32044-large_default/paredes-botas-trekking-camel.jpg",
        "categoria" => "Calzado"
    ],
    [
        "id" => 8,
        "nombre" => "Gafas de sol",
        "descripcion" => "Gafas de sol para el dia a dia.",
        "precio" => 200,
        "img" => "https://www.farmaciagt.com/10345-large_default/gafas-de-sol-polarizadas-perspektiv-aw19.jpg",
        "categoria" => "Accesorios"
    ],
    [
        "id" => 9,
        "nombre" => "Pinza de pelo",
        "descripcion" => "Pinza de pelo para el dia a dia.",
        "precio" => 5,
        "img" => "https://fetichesuances.com/38508/pinza-del-pelo-flor-hawaiana-amarillo-pastel.jpg",
        "categoria" => "Accesorios"
    ],

];

if (isset($_GET['id'])) {
    header('Content-Type: application/json');
    $id = intval($_GET['id']);
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            echo json_encode($p);
            exit;
        }
    }
    echo json_encode(["error" => "Producto no encontrado"]);

 }else if (isset($_GET['max'])) {
    header('Content-Type: application/json');
    $max = $_GET['max'];    

    $productosFiltrados = array_filter($productos, fn($p) => $p['precio'] <= $max);
    echo json_encode($productosFiltrados);
   
    //echo json_encode(["error" => "Producto no encontrado"]);

 } else if (isset($_GET['modo']) && $_GET['modo'] === 'texto') {
    header('Content-Type: text/html; charset=UTF-8');
    mostrarProductosJSON($productos);
} //Pista debes detectar el max con  el get para el ejercicio--> Ejercicio 4: Filtrado de productos por GET
else {
    echo json_encode($productos);
}


///Función que muestra por pantalla un listado de productos.
//http://localhost/ra1clienteservidorexmamen/servidor/api.php?modo=texto
function mostrarProductosJSON($productos) {
    echo "--- Lista de productos ---<br>";
    $json = json_encode($productos);
    $array = json_decode($json, true);
    //Crear un foreach para recorrerlo  y pintar por pantalla, el id, nombre y precio del producto
    foreach ($array as $producto) {
        echo $producto['nombre']. " - ". $producto['precio'] . " € <br></br>";
       
    }
}

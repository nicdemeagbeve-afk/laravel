<?php

$imgPath = 'public/storage/vehicles/';
$names = ['toyota-corolla', 'honda-civic', 'vw-golf', 'peugeot-208', 'renault-scenic', 'hyundai-i20'];
$colors = [[70, 80, 100], [0, 0, 0], [220, 50, 50], [50, 100, 200], [255, 255, 255], [192, 192, 192]];
$labels = ['Toyota Corolla', 'Honda Civic', 'VW Golf', 'Peugeot 208', 'Renault Scenic', 'Hyundai i20'];

foreach ($names as $i => $name) {
    $image = imagecreate(500, 350);
    
    $bg = $colors[$i];
    $bgColor = imagecolorallocate($image, $bg[0], $bg[1], $bg[2]);
    
    $textColor = imagecolorallocate($image, 255, 255, 255);
    $darkColor = imagecolorallocate($image, 50, 50, 50);
    
    imagefill($image, 0, 0, $bgColor);
    
    // Ajouter du texte
    imagestring($image, 5, 150, 100, $labels[$i], $textColor);
    imagestring($image, 5, 200, 250, '🚗', $darkColor);
    
    imagepng($image, $imgPath . $name . '.png');
    imagedestroy($image);
    
    echo "Image créée: " . $name . ".png\n";
}

echo "Toutes les images ont été créées!\n";
?>

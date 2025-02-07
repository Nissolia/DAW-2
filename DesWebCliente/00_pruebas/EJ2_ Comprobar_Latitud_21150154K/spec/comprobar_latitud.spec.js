describe('Testeo expresión regular comprobar latitud geográfica', () => {

    const latitudesCorrectas=[
        "8º 12' 56'' N",
        "08º 52' 6'' S",
        "89º 2' 12'' N",
        "89º 02' 12'' N",
        "9º 22' 52'' S",
        "0º 0' 52'' S",
        "0º 10' 0'' N",
        "0º 0' 0'' N",
        "10º 10' 10'' N",
        "19º 19' 19'' S",
    ];

    const latitudesIncorrectas=[
        "90º 10' 55'' N",
        "89º 60' 55'' S",
        "9º 12' 71'' S",
        "09º 121' 12'' S",
        "21º 12' 15'' T",
        "21º 121' 15'' S",
        "91º 11' 11'' N",
        "11 11' 11'' N",
        "11º 11 11'' N",
        "11º 11' 11 N",
    ];


    describe('Comprobación latitudes correctas', () => {
        latitudesCorrectas.forEach(
            (item)=>{
                it(`${item} debería ser latitud correcta`, () => {
                    expect(comprobarLatitud(item)).toBeTrue();;
                });
            }
        );
        
    });

    describe('Comprobación latitudes incorrectas', () => {
        latitudesIncorrectas.forEach(
            (item)=>{
                it(`${item} debería ser latitud incorrecta`, () => {
                    expect(comprobarLatitud(item)).toBeFalse();;
                });
            }
        );
        
    });

});

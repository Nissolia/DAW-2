describe('Testeo expresi�n regular comprobar latitud geogr�fica', () => {

    const latitudesCorrectas=[
        "8� 12' 56'' N",
        "08� 52' 6'' S",
        "89� 2' 12'' N",
        "89� 02' 12'' N",
        "9� 22' 52'' S",
        "0� 0' 52'' S",
        "0� 10' 0'' N",
        "0� 0' 0'' N",
        "10� 10' 10'' N",
        "19� 19' 19'' S",
    ];

    const latitudesIncorrectas=[
        "90� 10' 55'' N",
        "89� 60' 55'' S",
        "9� 12' 71'' S",
        "09� 121' 12'' S",
        "21� 12' 15'' T",
        "21� 121' 15'' S",
        "91� 11' 11'' N",
        "11 11' 11'' N",
        "11� 11 11'' N",
        "11� 11' 11 N",
    ];


    describe('Comprobaci�n latitudes correctas', () => {
        latitudesCorrectas.forEach(
            (item)=>{
                it(`${item} deber�a ser latitud correcta`, () => {
                    expect(comprobarLatitud(item)).toBeTrue();;
                });
            }
        );
        
    });

    describe('Comprobaci�n latitudes incorrectas', () => {
        latitudesIncorrectas.forEach(
            (item)=>{
                it(`${item} deber�a ser latitud incorrecta`, () => {
                    expect(comprobarLatitud(item)).toBeFalse();;
                });
            }
        );
        
    });

});

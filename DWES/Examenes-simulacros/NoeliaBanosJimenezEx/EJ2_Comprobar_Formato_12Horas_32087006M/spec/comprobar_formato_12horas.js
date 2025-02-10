describe('Testeo expresión regular comprobar hora formato 12horas', () => {
    const horasCorrectas=[
        "08:54 pm",
        "8:54 pm",
        "08:54 am",
        "08:54 pm",
        "12:54 pm",
        "12:54 am",
        "1:54 am",
        "12:59 am",
        "12:59 am",
        "1:04 pm",
    ];

    const horasIncorrectas=[
        "13:54 pm",
        "11:4 pm",
        "11:4 am",
        "13:54 am",
        "08:61 am",
        "00:12 pm",
        "12:54 cm",
        "12:54",
        "20:54 am",
        "20:54 pm",
    ];


    describe('Comprobación horas correctas', () => {
        horasCorrectas.forEach(
            (item)=>{
                it(`${item} debería ser fecha correcta`, () => {
                    expect(comprobarHora(item)).toBeTrue();;
                });
            }
        );
        
    });

    describe('Comprobación horas incorrectas', () => {
        horasIncorrectas.forEach(
            (item)=>{
                it(`${item} debería ser hora incorrecta`, () => {
                    expect(comprobarHora(item)).toBeFalse();
                });
            }
        );
        
    });

});


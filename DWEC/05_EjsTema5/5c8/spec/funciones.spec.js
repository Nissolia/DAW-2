describe("Pruebas de validaDireccionIP", function () {
    it("Debería validar direcciones IP válidas", function () {
        expect(validaDireccionIP("192.168.1.1")).toBe(true);
        expect(validaDireccionIP("255.255.255.255")).toBe(true);
        expect(validaDireccionIP("0.0.0.0")).toBe(true);
        expect(validaDireccionIP("127.0.0.1")).toBe(true);
        expect(validaDireccionIP("10.0.10.10")).toBe(true);
    });

    it("Debería rechazar direcciones IP inválidas", function () {
        expect(validaDireccionIP("256.256.256.256")).toBe(false);
        expect(validaDireccionIP("192.168.1")).toBe(false);
        expect(validaDireccionIP("192.168.1.1.1")).toBe(false);
        expect(validaDireccionIP("192.168.-1.1")).toBe(false);
        expect(validaDireccionIP("192.168.abc.1")).toBe(false);
    });
});
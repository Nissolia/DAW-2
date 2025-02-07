interface JarraBase {
	setCantidad(x:number): void;
	getCantidad(): number;
	getCapacidad(): number;
	llenarDesde(otraJarra:Jarra): void;
}
class Jarra implements JarraBase {
	private readonly capacidad: number;
	private cantidad: number;

	constructor(capacidad:number, cantidad:number) {
		this.capacidad=capacidad;
		this.cantidad=cantidad;
	}
	setCantidad(cantidad:number) {
		if (cantidad<=this.capacidad) {
			this.cantidad = cantidad;
		}
	}
	getCantidad():number {
		return this.cantidad;
	}
	getCapacidad():number {
		return this.capacidad;
	}
	llenar() {
		this.cantidad = this.capacidad;
	}
	vaciar() {
		this.cantidad = 0;
	}
	llenarDesde(otraJarra:Jarra) {
		let espacio = this.capacidad - this.cantidad;
		if (espacio>=otraJarra.getCantidad()) {
			this.cantidad += otraJarra.getCantidad();
		} else {
			this.llenar();
			otraJarra.setCantidad(otraJarra.getCantidad() - espacio);
		}
	}
	static comparar(jarra1:Jarra, jarra2:Jarra):Jarra {
		if (jarra1.getCantidad() >= jarra2.getCantidad()) {
			return jarra1;
		} else {
			return jarra2;
		}
	}
}
class JarraLimitada extends Jarra {
	constructor(capacidad:number, cantidad:number) {
		if (capacidad<=10) {
			super(capacidad, cantidad);
		}
	}
	vaciarMitad() {
		this.setCantidad(this.getCantidad()/2);
	}
}
function testeoJarra() {
	var jarra1=new Jarra(10,4); // Crea una jarra de 10 litros de capacidad y llena con 4 litros
	var jarra2=new Jarra(15,8); // Crea una jarra de 15 litros de capacidad y llena con 8 litros
	Jarra.comparar(jarra1, jarra2); // Debería devolver jarra2, ya que contiene más litros que jarra1
	jarra1.llenarDesde(jarra2); // Llena jarra1 con el contenido que quepa de jarra2. A jarra1 le quedan 6 litros para llenarse, por lo que jarra1 debería llenarse completamente (4+6=10 litros) y jarra2 quedar con 2 litros (8-6= 2 litros)
	console.log(`cantidad jarra1: ${jarra1.getCantidad()}`); // Debería mostrar 10 litros
	console.log(`cantidad jarra2: ${jarra2.getCantidad()}`); // Debería mostrar 2 litros
	jarra2.vaciar(); //Debería vaciarse completamente la jarra2
	console.log(`cantidad jarra2: ${jarra2.getCantidad()}`); // Debería mostrar 0 litros
}
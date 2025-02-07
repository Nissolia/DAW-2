class Student {
    constructor(firstName, middleInitial, lastName, edad) {
        this.firstName = firstName;
        this.middleInitial = middleInitial;
        this.lastName = lastName;
        this.edad = edad;
        this.fullName = firstName + " " + middleInitial + " " + lastName;
    }
}
class EstudianteCiclo extends Student {
    constructor(firstName, middleInitial, lastName, edad, fct) {
        super(firstName, middleInitial, lastName, edad);
        this.fct = fct;
    }
    toString() {
        return this.firstName + " " + this.middleInitial + " " + this.lastName + " " + this.edad;
    }
}
function greeter(person) {
    return "Hello, " + person.firstName + " " + person.lastName + " " + person.edad;
}
let user = new Student("Jane", "M.", "User", 30);
let userCiclo = new EstudianteCiclo("Pedro", "J.", "Smith", 25, true);
let nombre = "Javier";
//document.body.innerHTML = greeter(user);
document.body.innerHTML = greeter(userCiclo);

class Student {
    fullName: string;
    constructor(public firstName: string, public middleInitial: string, public lastName: string, public edad:number) {
        this.fullName = firstName + " " + middleInitial + " " + lastName;
    }
}

class EstudianteCiclo extends Student {
    constructor(firstName:string, middleInitial:string,lastName:string,edad:number,public fct:boolean) {
        super(firstName,middleInitial,lastName,edad);
    }

    toString(){
        return this.firstName + " " + this.middleInitial + " " + this.lastName + " " + this.edad;
    }
}

interface Person {
    firstName: string;
    lastName: string;
    edad:number;
}

function greeter(person : Person) {
    return "Hello, " + person.firstName + " " + person.lastName + " " + person.edad;
}

let user = new Student("Jane", "M.", "User",30);
let userCiclo=new EstudianteCiclo("Pedro", "J." , "Smith", 25, true);

let nombre:string="Javier";


//document.body.innerHTML = greeter(user);
document.body.innerHTML=greeter(userCiclo);
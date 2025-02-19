var __extends = (this && this.__extends) || (function () {
    var extendStatics = function (d, b) {
        extendStatics = Object.setPrototypeOf ||
            ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
            function (d, b) { for (var p in b) if (Object.prototype.hasOwnProperty.call(b, p)) d[p] = b[p]; };
        return extendStatics(d, b);
    };
    return function (d, b) {
        if (typeof b !== "function" && b !== null)
            throw new TypeError("Class extends value " + String(b) + " is not a constructor or null");
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var Student = /** @class */ (function () {
    function Student(firstName, middleInitial, lastName, edad) {
        this.firstName = firstName;
        this.middleInitial = middleInitial;
        this.lastName = lastName;
        this.edad = edad;
        this.fullName = firstName + " " + middleInitial + " " + lastName;
    }
    return Student;
}());
var EstudianteCiclo = /** @class */ (function (_super) {
    __extends(EstudianteCiclo, _super);
    function EstudianteCiclo(firstName, middleInitial, lastName, edad, fct) {
        var _this = _super.call(this, firstName, middleInitial, lastName, edad) || this;
        _this.fct = fct;
        return _this;
    }
    EstudianteCiclo.prototype.toString = function () {
        return this.firstName + " " + this.middleInitial + " " + this.lastName + " " + this.edad;
    };
    return EstudianteCiclo;
}(Student));
function greeter(person) {
    return "Hello, " + person.firstName + " " + person.lastName + " " + person.edad;
}
var user = new Student("Jane", "M.", "User", 30);
var userCiclo = new EstudianteCiclo("Pedro", "J.", "Smith", 25, true);
var nombre = "Javier";
//document.body.innerHTML = greeter(user);
document.body.innerHTML = greeter(userCiclo);

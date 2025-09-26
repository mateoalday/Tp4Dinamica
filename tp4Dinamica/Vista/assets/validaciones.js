$.validator.addMethod("patenteValida", function(value){
    return /^[A-Za-z]{3}\s[0-9]{3}$/.test(value) || /^[A-Za-z]{3}[0-9]{3}$/.test(value);
}, "Tiene que ser una patente valida");

$.validator.addMethod('toString', function(value, element) {
    return  /^[a-zA-Z]+$/.test(value);
}, "Solo letras");


$("#formulario").validate({
    rules:{
        patente:{
            required: true,
            patenteValida: true,
            minlength:2
        },        
        Nombre:{
            required: true,
            minlength: 3,
            maxlength: 50,
            toString: true
        },
        Apellido:{
            required: true,
            minlength: 3,
            maxlength: 50,
            toString: true
        },
        NroDni:{
            required: true,
            digits: true,
            minlength: 7,
            maxlength: 8
        },
        fechaNac:{
            required: true,
            date: true
        },
        Telefono:{
            required: true,
            digits: true,
            minlength: 8,
            maxlength: 15
        },
        Domicilio:{
            required: true,
            minlength: 5,
            maxlength: 50
        },
        DniDuenio:{
            required: true,
            digits: true,
            minlength: 7,
            maxlength: 8
        },
        modelo:{
            required: true,
            digits: true
        },
        marca:{
            required: true
        },

    },
    messages:{
        patente:{
            required: "<p>Debe ingresar la patente</p>",
            patenteValida: "Debe ingresar una patente valida",
            minlength : "Faltan caracteres"
        },
        Nombre:{
            required: "Debe ingresar el nombre",
            minlength: "El nombre debe tener al menos 3 caracteres",
            maxlength: "El nombre debe tener menos de 50 caracteres",
            toString: "Solo letras"
        },
        Apellido:{
            required: "Debe ingresar el apellido",
            minlength: "El apellido debe tener al menos 3 caracteres",
            maxlength: "El apellido debe tener menos de 50 caracteres",
            toString: "Solo letras"

        },
        NroDni:{
            required: "Debe ingresar el DNI",
            digits: "El DNI debe ser un numero",
            minlength: "El DNI debe tener al menos 7 caracteres",
            maxlength: "El DNI debe tener menos de 8 caracteres"
        },
        fechaNac:{
            required: "Debe ingresar la fecha de nacimiento",
            date: "Debe ser una fecha valida"
        },
        Telefono:{
            required: "Debe ingresar el telefono",
            digits: "El telefono debe ser un numero",
            minlength: "El telefono debe tener al menos 8 caracteres",
            maxlength: "El telefono debe tener menos de 15 caracteres"
        },
        Domicilio:{
            required: "Debe ingresar el domicilio",
            minlength: "El domicilio debe tener al menos 5 caracteres",
            maxlength: "El domicilio debe tener menos de 50 caracteres"
        },
        DniDuenio:{
            required: "Debe ingresar el DNI",
            digits: "El DNI debe ser un numero",
            minlength: "El DNI debe tener al menos 7 caracteres",
            maxlength: "El DNI debe tener menos de 8 caracteres"
        },
        modelo:{
            required: "Debe ingresar el modelo",
            digits: "El modelo debe ser un numero"
        },
        marca:{
            required: "Debe ingresar la marca"
        }
    }
});



function validate(form)
       {
        fail  = validatenumid(form.numid.value)
        fail += validatenombre(form.nombre.value)
        fail += validatefecha(form.fecha.value)
        fail += validatetipo(form.tipo.value)
        fail += validateemail(form.email.value)
        fail += validatetextarea(form.textarea.value)
        fail += validatenumc(form.numc.value)
        
        


        if   (fail == "")   return true
        else { alert(fail); return false   
        }
      }

      function validatenumid(field)
      {
        if (field == "") return "No Ingreso el ID.\n"
        else if (field.length < 6)
          return "El ID debe tener al menos de 6 caracteres.\n"
        return ""
        
      }

      function validatefecha(field)
      {
        return (field == "") ? "No ingreso la fecha.\n" : ""
      }

      function validatetipo(field)
      {
        return (field == "") ? "No ingreso el tipo de identificacion.\n" : ""
      }

      function validatenumc(field)
      {
        return (field == "") ? "No ingreso el numero de contacto.\n" : ""
      }

      function validatetextarea(field)
      {
        return (field == "") ? "No ingreso el motivo.\n" : ""
      }

      function validatenombre(field)
      {
        return (field == "") ? "No ingreso el Nombre.\n" : ""
      }

      function validateemail(field)
      {
        if (field == "") return "No ingreso el Email.\n"
          else if (!((field.indexOf(".") > 0) &&
                     (field.indexOf("@") > 0)) ||
                     /[^a-zA-Z0-9.@_-]/.test(field))
            return "El email debe contener un @ y un .\n"
        return ""
      }
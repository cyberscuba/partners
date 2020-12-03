$(document).ready(function () {
    $("#solisitar").click(function (e) { 
        e.preventDefault();
        $("#modelId").modal("show")
        returnBill().then((response)=>{
         
           $("#billi").val(response["data"][0]["bill"]);
        }).catch((response)=>{
            console.log(response);
        }) 
    }); 
    $("#monto").keyup(function (e) { 
        e.preventDefault();
        let dato =Numeros1($("#monto").val())
        $("#monto").val(dato);
    });
    $("#solcod").click(function (e) { 
        e.preventDefault();
        $("#notipetcode").empty()
        $("#notipetcode").append(`
        <div class="alert alert-warning">
            <div class="d-flex  justify-content-center">
            <img src="assets/img/icons/loading.gif"/>
            </div>
        </div>
        `);
        solicitaCodigo().then((response)=>{
         
            let color;
            let mensaje;
            if (response["error"]["code"]) {
                color="alert-success"
                mensaje=response["error"]["mej"]
            }else{
                color="alert-danger"
                mensaje=`<strong>Alerta! </strong> `+response["error"]["mej"]
            }
            $("#notipetcode").empty()
            $("#notipetcode").append(`
            <div class="alert `+color+`">
                <div class="d-flex  justify-content-center">
                   `+mensaje+`
                </div>
            </div>
            `);
          
        }).catch((response)=>{
            console.log(response);
        }) 
    }); 
    $("#sol").submit(function (e) { 
      console.log("dsfgsdhgfasdf");
      
        $("#notipetcode").empty()
        $("#notipetcode").append(`
        <div class="alert alert-warning">
            <div class="d-flex  justify-content-center">
            <img src="assets/img/icons/loading.gif"/>
            </div>
        </div>
        `);
        e.preventDefault();
        createSol().then((response)=>{
          let color;
          let mensaje;
          
             if (response["error"]["code"]==0) {
                color="alert-success"
                mensaje=response["error"]["mej"]
            }else{
                color="alert-danger"
                mensaje=`<strong>Alerta!</strong> `+response["error"]["mej"]
                
            }
            $("#notipetcode").empty()
            $("#notipetcode").append(`
            <div class="alert `+color+`">
                <div class="d-flex  justify-content-center">
                `+mensaje+`
                </div>
            </div>
            `); 
        }).catch((response)=>{
            console.log(response);
            
        })
    });

});

function solicitaCodigo(){
    $("#loading_login").show();
    return new Promise((resolve,reject)=>{
        $.ajax({
            type:"POST",
            url:"./class/requestgeneral.php",
            dataType:"json",
            data:"request=createcode",
        }).done((response)=>{
           return resolve(response);
        }).fail((response)=>{ 
            return reject(response)
        })
    })
}
function returnBill(){
    $("#loading_login").show();
    return new Promise((resolve,reject)=>{
        $.ajax({
            type:"POST",
            url:"./class/requestgeneral.php",
            dataType:"json",
            data:"request=returnBill",
        }).done((response)=>{
           return resolve(response);
        }).fail((response)=>{ 
            return reject(response)
        })
    })
}
function createSol(){
    $("#loading_login").show();
    let data= $("#sol").serialize();
    return new Promise((resolve,reject)=>{
        $.ajax({
            type:"POST",
            url:"./class/requestgeneral.php",
            dataType:"json",
            data:"request=createSol&"+data,
        }).done((response)=>{
           return resolve(response);
        }).fail((response)=>{ 
            return reject(response)
        })
    })
}
function Numeros1(string){//Solo numeros
    var out = '';
    var filtro = '1234567890';//Caracteres validos
	
    //Recorrer el texto y verificar si el caracter se encuentra en la lista de validos 
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
             //Se añaden a la salida los caracteres validos
	     out += string.charAt(i);
	
    //Retornar valor filtrado
    return out;
};

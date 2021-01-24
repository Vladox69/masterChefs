<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
    <link rel="stylesheet" type="text/css" href="/masterChefs/jquery-easyui-1.9.11/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="/masterChefs/jquery-easyui-1.9.11/themes/icon.css">        
        <script type="text/javascript" src="/masterChefs/jquery-easyui-1.9.11/jquery.min.js"></script>
        <script type="text/javascript" src="/masterChefs/jquery-easyui-1.9.11/jquery.easyui.min.js"></script>    
    <link rel="stylesheet" type="text/css" href="/masterChefs/jquery-easyui-1.9.11/demo/demo.css">
</head>
<body>
    <h2>Formulario Recetas</h2>
    <p>Seleccionar los botones para obtener el proceso deseado.</p>
    <table id="dg" title="Recetario" class="easyui-datagrid" style="width:700px;height:250px"
            url="models/cargar.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="ID_REC" width="50">IDENTIFICADOR</th>
                <th field="TITULO_REC" width="50">TITULO</th>
                <th field="INGRE_REC" width="50">INGREDIENTES</th>
                <th field="DESC_REC" width="50">DESCRIPCION</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nueva Receta</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Receta</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Receta</a>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px" action="http://localhost/masterChefs/models/acceso.php">
           <input type="hidden" id="op" name="op" value="insertarReceta"> 
           <input type="hidden" id="ope" name="ope" value="updateReceta">           
            <h3>Informacion Receta</h3>
            <div style="margin-bottom:10px">
                <input name="ID_REC" class="easyui-textbox" required="true" label="ID:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="TITULO_REC" class="easyui-textbox" required="true" label="TITULO:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="INGRE_REC" class="easyui-textbox" label="INGREDIENTES:" labelPosition="top" multiline="true" value="Lista Ingredientes" style="width:100%;height:120px">
            </div>
            <div style="margin-bottom:20px">
                <input name="DESC_REC" class="easyui-textbox" label="DESCRIPCION:" labelPosition="top" multiline="true" value="Redactar la receta" style="width:100%;height:120px">
            </div>         
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitForm()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
    </div>

    <div id="bot" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#bot-buttons'">
        <form id="frame" method="post" novalidate style="margin:0;padding:20px 50px" action="http://localhost/masterChefs/models/acceso.php">
           <input type="hidden" id="op" name="op" value="updateReceta"> 
           <h3>Informacion Receta</h3>
            <div style="margin-bottom:10px">
                <input name="ID_REC" class="easyui-textbox" required="true" label="ID:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="TITULO_REC" class="easyui-textbox" required="true" label="TITULO:" style="width:100%">
            </div>
            <div style="margin-bottom:20px">
                <input name="INGRE_REC" class="easyui-textbox" label="INGREDIENTES:" labelPosition="top" multiline="true" value="Lista Ingredientes" style="width:100%;height:120px">
            </div>
            <div style="margin-bottom:20px">
                <input name="DESC_REC" class="easyui-textbox" label="DESCRIPCION:" labelPosition="top" multiline="true" value="Redactar la receta" style="width:100%;height:120px">
            </div> 
        </form>
    </div>
    <div id="bot-buttons">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitFormUpdate()" style="width:90px">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#bot').dialog('close')" style="width:90px">Cancel</a>
    </div>

    <script type="text/javascript">
        var url;
        function newUser(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nueva Receta');
            $('#fm').form('load');
            url = 'save_user.php';
        }
        

        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $('#bot').dialog('open').dialog('center').dialog('setTitle','Editar Receta');
                $('#frame').form('load',row);
                url = 'update_user.php?id='+row.id;
            }
        }

       
        function submitFormUpdate(){
            $('#frame').form("submit");
            $('#frame').form({
                success:function(data){
                    console.log(data);
                    if(data.indexOf("ERROR")!==-1){
                        $.messager.alert("ERROR",data,"ERROR");
                    }else{
                        $.messager.alert(data);
                    }
                }
            });
        }

        function saveUser(){
            $('#fm').form('submit',{
                url: url,
                onSubmit: function(){
                    return $(this).form('validate');
                },
                success: function(result){
                    var result = eval('('+result+')');
                    if (result.errorMsg){
                        $.messager.show({
                            title: 'Error',
                            msg: result.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');        // close the dialog
                        $('#dg').datagrid('reload');    // reload the user data
                    }
                }
            });
        }
        function submitForm(){
            $('#fm').form("submit");
            $('#fm').form({
                success:function(data){
                    console.log(data);                    
                    if(data.indexOf("ERROR")!==-1){
                        $.messager.alert("ERROR",data,"ERROR");
                    }else{
                        $.messager.alert(data);
                    }
                }
            });
        }
         
        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                $.messager.confirm('Confirm','¿Desea eliminar la receta?',function(r){
                    if (r){
                        $.post('models/acceso.php',{ op: "deleteReceta",
                         CED_EST: row["CED_EST"]},function(resultado){
                            if (resultado.success){
                                $('#dg').datagrid('reload');    // reload the user data
                            } else {
                                $.messager.show({    // show error message
                                    title: 'Eliminado',
                                    //msg: resultado.errorMsg
                                });
                            }
                        },'json');
                    }
                });
            }
        }        
    </script>
</body>
</html>
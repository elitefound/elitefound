<?php
require_once("../../../config-ext.php");
include("../controller/encoded.php");
$users = "";
$sql="SELECT * FROM user WHERE UserTipo = '2'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $users .= "<tr>
            <td>
                ".decoded($row['nombre'])." ".decoded($row['apellido'])."
            </td>
            <td>
                ".$row['username']."</td><td>".decoded($row['email'])."
            </td>
                <td>
                    <button id=\"btnActualizar\" type=\"button\" class=\"btn btn-primary\" onclick=\"Actualizar(".$row['id_user'].")\">
                        Actualizar
                    </button>
                </td>
                <td>
                    <form action='entrarComo.php' method='post'>
                        <input type='hidden' name='EmailUser' value='".$row['email']."'>
                        <input type='hidden' name='passUser' value='".$row['contrasena']."'>
                        <button type='submit' class='btn btn-secondary'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z'/>
                                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0'/>
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>";
    }
}
<?php

function numberRows($table, $type){
    include('../controllers/connection.php');
    $querySlcNum = "SELECT * from $table";
    $resultQuery = mysqli_query($conn, $querySlcNum);
    if($type === "NUMBERS"){
        $row_cnt = mysqli_num_rows($resultQuery);
        return $row_cnt;
    }elseif($type === "DATA"){
        return $resultQuery;
    }

}

function selectTablesInner($idTicket, $getValue){
    include('../controllers/connection.php');
    if($idTicket === "IDUSER" && !empty($getValue)){
        $querySearch = "SELECT ticket_genericos.ID_TICKET, ticket_genericos.CODIGO_TICKET, status_ticket.STATUS, areas.AREA 
        from ((ticket_genericos 
        inner join areas on ticket_genericos.ID_AREA = areas.ID_AREA)
        inner join status_ticket on ticket_genericos.ID_STATUS = status_ticket.ID_STATUS) 
        WHERE ticket_genericos.CODIGO_TICKET = '$getValue'";
        $executeQuery = mysqli_query($conn, $querySearch);        
        $raw = mysqli_fetch_assoc($executeQuery);
        return $raw; 
    }elseif($idTicket === "INNER" && $getValue === "CONSULTA"){
        $selectManyTables = "SELECT ticket_genericos.ID_TICKET, ticket_genericos.CODIGO_TICKET, status_ticket.STATUS, areas.AREA 
        from ((ticket_genericos 
        inner join areas on ticket_genericos.ID_AREA = areas.ID_AREA)
        inner join status_ticket on ticket_genericos.ID_STATUS = status_ticket.ID_STATUS)";
        $queryExecute = mysqli_query($conn, $selectManyTables);
        return $queryExecute;
    }

}
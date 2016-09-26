<?php
    require_once('../database/database.php');

    $sql = "SELECT count(*) FROM omnikassa WHERE TransactionReference = '$sTransactionReference' ";
    $result = $dbh->prepare($sql);
    $result->execute();
    $number_of_rows = $result->fetchColumn();

    if($number_of_rows < 1) {
    $statement = $dbh->prepare("INSERT INTO omnikassa(TransactionReference, OrderId, TransactionStatus)
    VALUES(:TransactionReference, :OrderId, :TransactionStatus)");
    $statement->execute(array(
    "TransactionReference" => $sTransactionReference,
    "OrderId" => $sOrderId,
    "TransactionStatus" => $sTransactionStatus
    ));
    } else if($number_of_rows > 0) {
    $sql = ("UPDATE omnikassa SET
    TransactionReference = :TransactionReference,
    OrderId = :OrderId,
    TransactionStatus = :TransactionStatus
    ");
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':TransactionReference', $sTransactionReference);
    $stmt->bindParam(':OrderId', $sOrderId);
    $stmt->bindParam(':TransactionStatus',$sTransactionStatus );
    $stmt->execute();
    }


    return header("Location: order/handle?ref=$sTransactionReference");

?>
function testConfirmDialog()  {

    var result = confirm("Do you want to continue?");

    if(result)  {
        alert("OK Next lesson!");
    } else {
        alert("Bye!");
    }
}
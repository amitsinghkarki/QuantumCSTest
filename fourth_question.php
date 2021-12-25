

<form id="board" name="board" method="post" action="fourth_question.php">
<h1> Tick Tac Toe Game Using PHP and Javacript</h1>
    <table class="tic-tac-toe" cellpadding="0" cellspacing="0">
        <tbody>
        <tr>

        <?php
for ($i = 1; $i <= 9; $i++) {
    if ($i % 3 == 1) {
        echo '</tr><tr>';
    }

    echo '<td><input id="' . $i . '" type="submit" class="tick"  name="button' . $i . '" value="" onclick="cellClicked(this.id);"  /></td>';
    //"
}
?>
</form>

<style>
.tick{
    padding: 2px;
    background-color: #4CAF50; /* Green */
    height:200px;
    width:200px;
  border:solid;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: fixed;
  font-size: 80px;
}

</style>


<script type="text/javascript">

    var board=[];
    var winConditions = [
    [1, 2, 3], [4, 5, 6], [7, 8, 9], // rows
    [1, 4, 7], [2, 5, 8], [3, 6, 9], // columns
    [1, 5, 9], [3, 5, 7], // diagonals
];

    function checkWin()
    {
            winConditions.forEach(element => {

         if(this.board[element[0]]==this.board[element[1]] && this.board[element[0]]==this.board[element[2]]
         && this.board[element[0]]!='' && this.board[element[0]]!=undefined){

 alert("Congratulations "+this.board[element[0]]+" is the winner");
 window.location = "fourth_question.php";
}});

    }
    function cellClicked(id) {
        let symbol;
        arguments.callee.counter=arguments.callee.counter || 0;
        arguments.callee.counter++;
        document.getElementById(id).disabled = true;
        arguments.callee.counter%2==0?symbol=document.getElementById(id).value='X':symbol=document.getElementById(id).value='O';
        board[id]=symbol;

        if(arguments.callee.counter>3)
        checkWin();
        if(arguments.callee.counter==9)
            alert('match draw');
    }
</script>
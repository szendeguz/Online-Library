<?php
include_once 'includes/dbc.php';
include_once 'classes/models/booksmodel.php';
//view class for books page
class Booksview {
    //makes the books table for users in accordance whether it is rented or nor
    public static function showBooks(){
        $con = Dbc::connect();
        $booksArr = Booksmodel::getBooks($con);

        $indexVariable =0;

        foreach($booksArr as $book){
            if($book['rent_status']==0){
                echo '<tr>
                <th scope="row">
                <!-- Default unchecked -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="bookArr[]" value="'.$book['id'].'" class="custom-control-input checks" id="tableDefaultCheck'.$indexVariable.'">
                    <label class="custom-control-label" for="tableDefaultCheck'.$indexVariable.'">Check</label>
                </div>
                </th>
                <td>'.$book['title'].'</td>
                <td>'.$book['author'].'</td>
                <td>Yes</td>
            </tr>';
            }else{
                echo '<tr>
                <th scope="row">
                </th>
                <td>'.$book['title'].'</td>
                <td>'.$book['author'].'</td>
                <td>No</td>
            </tr>';
            }
            
            $indexVariable++;
        }
    }
    //makes the books table for admins
    //if a book is not in rented state then admins can delete the book
    public static function showAdminBooks(){
        $con = Dbc::connect();
        $booksArr = Booksmodel::getBooks($con);

        $indexVariable =0;

        foreach($booksArr as $book){
            if($book['rent_status']==0){
                echo '<tr>    
                <td>'.$book['title'].'</td>
                <td>'.$book['author'].'</td>
                <td>Yes</td>
                <form action="includes/deletescript.php" method="post">
                <td><button type="submit" class="btn btn-primary" id="removeitem" name="'.$book['id'].'">Remove</button></td>
                </form>
                </tr>';
            }else{
                echo '
                <td>'.$book['title'].'</td>
                <td>'.$book['author'].'</td>
                <td>No</td>
            </tr>';
            }
            
            $indexVariable++;
        }
    }
}
<?php 
    try{
                    $result =  $db->query('select * from peneh_app_pages WHERE type = "file" AND created_by = ' . $user_id . ' ORDER BY name');

                    if ($result->rowCount()>0){

                         echo '<table class="table"><tr><th>Name</th>
                                        <th>Description</th>
                                        <th>Group</th>
                                        <th>Users</th>
                                        <th>Manage</th></tr>';

                        foreach ($result as $row){
    //fix xss injection
                            $row = fix_xss($row);
                            
                          echo  "<tr><td><a href='../p/{$row["type"]}/{$row['id']}/{$row['name']}'>{$row["name"]}</a></td>
                                     <td>{$row["description"]}</td> ";
                                      $groups_in_page = count_field($db, 'peneh_app_group_page_link', 'page_id', $row['id']);
                             echo        "<td>{$groups_in_page}</td>";
                            
                                      $users_in_page = count_field($db, 'peneh_app_user_page_link', 'page_id', $row['id']);

                            echo "<td>{$users_in_page}</td>
                            <td><a href='blogs/manage_page_users.php?id={$row['id']}'>Manage Page</a></td>
                            <td><a href='blogs/edit-page.php?id={$row['id']}'>Edit Page</a></td>
                            <td><a class='delete' href='blogs/delete.php?id={$row['id']}'>Delete<a/></td>

                                                
                                    </tr>";
                        }//end foreach
                        echo '</table>';
                    } else{
                        echo 'nothing there';
                    }//end if nothing there
            } catch(PDOException $e){
        echo 'Opps there whre an error<br><br>' . $e->getMessage();
    }
            ?>
 <?php 
    try{
                    $result =  $db->query('select * from peneh_app_groups WHERE created_by = ' . $user_id . ' ORDER BY name');

                    if ($result->rowCount()>0){

                         echo '<table class="table"><tr><th>Name</th>
                                        <th>Description</th>
                                        <th>Users</th>
                                        <th>Pages</th>
                                        <th>Manage</th></tr>';

                        foreach ($result as $row){
    //fix xss injection
                            $row = fix_xss($row);
                            
                          echo  "<tr><td>{$row["name"]}</td>
                                     <td>{$row["description"]}</td>";
                         $users_in_group = count_field($db, 'peneh_app_user_group_link', 'group_id', $row['id']);
                         $pages_in_group = count_field($db, 'peneh_app_group_page_link', 'group_id', $row['id']);
                            echo "<td>{$users_in_group}</td>
                            <td>{$pages_in_group}</td>";
                           echo      "<td><a href='groups/manage_group_users.php?id={$row['id']}'>Manage Users</a></td>
                                          <td><a href='groups/edit-group.php?id={$row['id']}'>Edit Group</a></td>

                                          <td><a class='delete' href='groups/delete.php?id={$row['id']}'>Delete<a/></td>

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
<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10/12/14
 * Time: 15:15
 */

namespace views;

class AuctionView extends View {

    public function __construct($model) {
        parent::__construct($model);
    }

    public function prepare() {
        $this->model->execute();
    }

    public function render() {
include_once(__DIR__ . "/../head.php");
include_once(__DIR__ . "/../navigation.php");


        ?>
        <div class="container">
            <!--
            <ul class="breadcrumb"><li><a href="/basic/web/index.php">Home</a></li>
                <li class="active">Login</li>
            </ul>
            -->
            <div class="site-login">




                <form id="login-form" class="form-horizontal" method="post" style="padding-top: 50px;">

                    <input type="hidden" name="_csrf" value="am1QdWhfeHMADChMMToeBzwJNSFRbyseIB8pEyAVSyAdCjNNJhwrHQ==">

                    <div class="form-group field-loginform-username required">
                        <label class="col-lg-1 control-label" for="username">ID do leilão</label>

                        <div class="col-lg-3"><input type="text" id="lid" class="form-control" name="username"></div>

                        <div class="col-lg-8"><p class="help-block help-block-error"></p></div>
                    </div>



                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <button type="submit" class="btn btn-primary" id="subscribe" name="login-button">Inscrever</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>


        <?php

        echo '<div class="container">';

        echo("<table>");
        echo("<tr><td>ID</td><td>NIF</td><td>diahora</td><td>NrDoDia</td><td>nome</td><td>tipo</td><td>valorbase</td></tr>\n");

        foreach ($this->model->getRecord() as $row) {
            echo("<tr><td>");
            echo($row['lid']); echo("</td><td>");
            echo($row["nif"]); echo("</td><td>");
            echo($row["dia"]); echo("</td><td>");
            echo($row["nrleilaonodia"]); echo("</td><td>");
            echo utf8_encode($row["nome"]); echo("</td><td>");
            echo($row["tipo"]); echo("</td><td>");
            echo($row["valorbase"]); echo("</td><td>");

        }
        echo("</table>\n");

        echo "</div>";

        include_once(__DIR__ . "/../footer.php");

    }
} 
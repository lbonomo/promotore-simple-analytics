<?php

// La pagina de opsiones
function ptr_analytics_options_page() {
   
    if ( isset( $_POST['ptr_analytics_code'] ) ) {
        $nonce = $_POST['psa_nonce'];
        
        printf("<script>console.log('%s')</script>", wp_verify_nonce($nonce, 'save_psa'));
        
        if ( ! wp_verify_nonce($nonce, 'save_psa') ) {
            die( 'Security check' );
        } else {
            # Guardo el código de seguimiento
            update_option('ptr_analytics_code', stripslashes($_POST['ptr_analytics_code']));
        }
    }
            
    ?>
    <div class="wrap">
        <h1>Simple Analytics (by <a href="https://promotore.com.ar">Promotore</a>)</h1>
            <form method='post'>
            	<?php wp_nonce_field('save_psa','psa_nonce'); ?>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row">Código de seguimiento</th>
                            <td>
                                <fieldset>
                                    <p><label>Pegue debajo el código de seguimiento provisto por Google Analytics </label></p>
                                    <p>
                                        <textarea name='ptr_analytics_code' 
                                                  rows="10" cols="50" 
                                                  class="large-text code"><?php echo get_option( 'ptr_analytics_code' ); ?></textarea>
                                    </p>
                                </fieldset>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <p class="submit"><input name="submit" id="submit" class="button button-primary" value="Guardar cambios" type="submit"></p>
        </form>
    </div>
    <?php
}


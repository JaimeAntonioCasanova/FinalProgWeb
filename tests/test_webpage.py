from selenium.webdriver.common.alert import Alert
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
import unittest
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.chrome.options import Options
import time
from HtmlTestRunner import HTMLTestRunner

class TestWebApp(unittest.TestCase):

    @classmethod
    def setUpClass(cls):
        # Configuración de Brave
        options = Options()
        options.binary_location = "C:/Program Files/BraveSoftware/Brave-Browser/Application/brave.exe"
        service = Service("C:/Users/anton/Desktop/chromedriver-win64/chromedriver.exe")
        cls.driver = webdriver.Chrome(service=service, options=options)
        cls.driver.maximize_window()

    def test_navigation(self):
        """Prueba la navegación entre las páginas desde el menú principal"""
        driver = self.driver
        driver.get("http://www.antonio-casanova.freesite.online/")  # Página inicial

        wait = WebDriverWait(driver, 10)

        # Navegar a la página de libros
        books_button = wait.until(EC.element_to_be_clickable((By.LINK_TEXT, "Ver Libros")))
        books_button.click()
        time.sleep(3)  # Espera para que se vea la acción
        self.assertIn("Listado de Libros", driver.title)

        # Regresar al menú principal
        driver.get("http://www.antonio-casanova.freesite.online/")
        time.sleep(2)

        # Navegar a la página de autores
        authors_button = wait.until(EC.element_to_be_clickable((By.LINK_TEXT, "Ver Autores")))
        authors_button.click()
        time.sleep(3)
        self.assertIn("Listado de Autores", driver.title)

        # Regresar al menú principal
        driver.get("http://www.antonio-casanova.freesite.online/")
        time.sleep(2)

        # Navegar a la página de tiendas
        stores_button = wait.until(EC.element_to_be_clickable((By.LINK_TEXT, "Ver Tiendas")))
        stores_button.click()
        time.sleep(3)
        self.assertIn("Listado de Tiendas", driver.title)

    def test_store_edit(self):
        """Prueba la edición de una tienda"""
        driver = self.driver
        driver.get("http://www.antonio-casanova.freesite.online/pages/list_stores.php")  # Página de tiendas

        wait = WebDriverWait(driver, 10)

        # Localizar botón de edición y abrir el modal
        edit_button = wait.until(EC.element_to_be_clickable((By.CLASS_NAME, "edit-btn")))
        edit_button.click()
        time.sleep(3)  # Espera para ver el modal

        # Editar los datos de la tienda
        name_field = wait.until(EC.presence_of_element_located((By.ID, "edit-store-name")))
        name_field.clear()
        name_field.send_keys("Tienda Actualizada Remoto")

        address_field = driver.find_element(By.ID, "edit-store-address")
        address_field.clear()
        address_field.send_keys("Nueva Dirección Remota")

        # Enviar el formulario
        submit_button = driver.find_element(By.CSS_SELECTOR, "button[type='submit']")
        submit_button.click()
        time.sleep(3)  # Espera para ver el mensaje de éxito

        # Manejar la alerta emergente de JavaScript
        try:
            alert = WebDriverWait(driver, 5).until(EC.alert_is_present())  # Espera hasta que la alerta esté presente
            alert.accept()  # Aceptar la alerta
            print("Alerta de 'Tienda actualizada' aceptada")
        except Exception as e:
            print(f"Error al manejar la alerta de JavaScript: {e}")
            self.fail("No se encontró la alerta emergente de JavaScript.")

        # Esperar un poco más para asegurarnos de que la página haya recargado
        time.sleep(3)

        # Ahora buscar el mensaje de éxito en el DOM
        try:
            success_message = wait.until(EC.visibility_of_element_located((By.CLASS_NAME, "alert-success")))  # O la clase que corresponda
            print("Mensaje de éxito encontrado")
            self.assertTrue(success_message.is_displayed())
        except Exception as e:
            print(f"Error al encontrar el mensaje de éxito: {e}")
            self.fail("No se encontró el mensaje de éxito.")

    @classmethod
    def tearDownClass(cls):
        cls.driver.quit()

if __name__ == "__main__":
    runner = HTMLTestRunner(output='report', report_title='Pruebas Selenium', descriptions='Resultados de pruebas')
    unittest.main(testRunner=runner)

import email
import time
import smtplib
import requests
import json
import datetime

#email setup
EMAIL_ADDRESS = 'noreply@b-caremadiun.org'
EMAIL_PASSWORD = 'UGEwCUHuWgP6'
EMAIL_HOST = 'ssl://mail.b-caremadiun.org'
EMAIL_PORT = 465

#init email server
server = smtplib.SMTP_SSL(EMAIL_HOST, EMAIL_PORT)
server.login(EMAIL_ADDRESS, EMAIL_PASSWORD)

REQUEST_HEADER = {
    'secret': '1234',
    'secret_mailservice': 'd506c9b266a3af81164dc6fe8fd94813'
}

REQUEST_URL = 'http://localhost/b-care/api/v1/mailservice'

def send_reminder(client):
  msg = email.message.Message()
  msg['Subject'] = 'Pengingat Donor Darah/Plasma PMI Madiun'
  msg['From'] = EMAIL_ADDRESS
  msg['To'] = client['email']
  msg.add_header('Content-Type', 'text/html')
  msg.set_payload(
    '<html>'
    '<body>'
    '<p>'
    'Halo {},<br>'
    '<br>'
    'Kami ingin mengingatkan anda untuk melakukan donor darah/plasma di PMI Madiun.<br>'
    '<br>'
    'Masuk ke applikasi B-Care untuk melakukan donor darah/plasma.<br>'
    '<br>'
    'B-Care'
    '</p>'
    '</body>'
    '</html>'.format(client['name'])
  )

def fetch_clients():
  client_list = []
  response = requests.get(REQUEST_URL, headers=REQUEST_HEADER)
  data = response.json()
  data = data['data']
  for client in data:
    temp = {
      'email': client['email'],
      'name': client['name'],
      'donor_date': client['donor_date']
    }
    client_list.append(temp)

  return client_list

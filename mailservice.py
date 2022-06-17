import email
import time
import smtplib
import requests
import csv
import datetime

#email setup
EMAIL_ADDRESS = 'noreply@b-caremadiun.org'
EMAIL_PASSWORD = 'UGEwCUHuWgP6'
EMAIL_HOST = 'mail.b-caremadiun.org'
EMAIL_PORT = 465

#init email server
server = smtplib.SMTP_SSL(EMAIL_HOST, EMAIL_PORT)
server.login(EMAIL_ADDRESS, EMAIL_PASSWORD)

REQUEST_HEADER = {
    'secret': '1234',
    'secret_mailservice': 'd506c9b266a3af81164dc6fe8fd94813'
}

REQUEST_URL = 'https://b-caremadiun.org/api/v1/mailservice'

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
  server.send_message(msg)

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
    #if email exists in client_list, skip
    if temp['email'] in [x['email'] for x in client_list]:
      continue

    client_list.append(temp)

  return client_list

def main():
  clients = fetch_clients()
  for client in clients:
    #check donor_date diff from today
    donor_date = datetime.datetime.strptime(client['donor_date'], '%Y-%m-%d')
    today = datetime.datetime.now()
    diff = today - donor_date
    diff = diff.days
    print("CHECK | {:<40} | {} Days".format(client['email'], diff))

    #if 3 months diff, send reminder
    if diff >= 90:
      print("SEND  | {}".format(client['email']))
      send_reminder(client)
    else:
      print("SKIP  | {} ".format(client['email']))

  #sleep program for 1 week
  time.sleep(604800)
  #restart program
  main()



if __name__ == '__main__':
  main()
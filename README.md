# EFRIS System-to-System (S2S) Integration Guide

What is EFRIS?
Electronic Fiscal Receipting and Invoicing Solution (EFRIS) is a government initiative under the Domestic Revenue Mobilization Strategy (2019/20-2023/24) that shall be used by all Value Added Tax (VAT) registered taxpayers’ businesses to manage the issuance of e-receipts and e-invoices in accordance with Sec 73A of the Tax Procedures Code Act 2014.

## Author

Bartile Emmanuel

Email: ebartile@gmail.com

Tel: +254757807150

---

## Installation

```bash
composer require paybilldev/ura-efris-sdk
```

> 📌 For more code details: [https://docs.paybill.dev](https://docs.paybill.dev/en/ura-efris-sdk/)

## What is an E-Receipt/E-Invoice?

An **e-receipt/invoice** is an electronic tax document issued under:

* **Business to Business (B2B)**
* **Business to Government (B2G)**
* **Business to Consumer (B2C)**

These documents are authenticated by the central EFRIS system.

## Available E-Invoicing Options

1. **System-to-System (S2S) Integration**: For clients with existing sales systems.
2. **URA Web Portal**: Through taxpayer's online account.
3. **Desktop (Client) Application**: Downloadable from the URA portal.
4. **Electronic Fiscal Devices (EFDs)**: Purchased from approved suppliers.

---

## Integration Steps for System-to-System (S2S)

### Step 1: Register on the Test Environment

Visit: [https://efristest.ura.go.ug/efrissite](https://efristest.ura.go.ug/efrissite)
Use the “How to Register” guide available under *User Guides*.

---

### Step 2: Download Technical Documents

Navigate to:
**Downloads → Documents**
API Endpoint:
[https://efris.ura.go.ug/site/manualDownload/downloadManualById?id=173517733139059055&language=](https://efris.ura.go.ug/site/manualDownload/downloadManualById?id=173517733139059055&language=)

---

### Step 3: Execute Interface Codes

#### Online Mode:

1. Test Interface – `T101`
2. Get Symmetric Key – `T104`
3. Login – `T103` *(Optional)*
4. Get System Dictionary – `T115` *(Optional)*

> 📌 Note: This project library call `T104` everytime it calls an endpoint

#### Signature and Encryption Process:

* **Get AES Key** from `T104`, decrypt using private key.
* **Encrypt request JSON** using AES.
* **Sign** using your RSA private key.


---

### Step 4: Joint UAT and Go-Live Configuration

1. Fill the **UAT Readiness Checklist**.

2. Submit checklist to:

   * `ikamya@ura.go.ug`
   * `sauma@ura.go.ug`
   * `tbesigye@ura.go.ug`
   * `jkayeny@ura.go.ug`
   * `bajuna@ura.go.ug`

3. Participate in UAT and sign-off on certificate of acceptance.

4. Use **Production URLs**:

   * Web: [https://efris.ura.go.ug/](https://efris.ura.go.ug/)
   * API: [https://efrisws.ura.go.ug/ws/taapp/getInformation](https://efrisws.ura.go.ug/ws/taapp/getInformation)

---

### 📘 **EFRIS System-to-System Interface Reference Table**

| Module                         | Interface Code | Mandatory / Optional                          | Interface Name                                 | Description / Remarks                                                                                                                    |
| ------------------------------ | -------------- | --------------------------------------------- | ---------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| System Setup & Data Encryption | T104           | Mandatory                                     | Get symmetric key and signature information    | Required for encryption-enabled interfaces. Mandatory when connecting directly to EFRIS endpoint without using the offline-mode enabler. |
| System Setup & Data Encryption | T115           | Mandatory                                     | System dictionary update                       | Used to map taxpayer’s system dictionary with EFRIS.                                                                                     |
| Registration                   | T119           | Mandatory                                     | Query Taxpayer Information By TIN              | Used for TIN validation.                                                                                                                 |
| Registration                   | T138           | Optional                                      | Get all branches                               | Used to retrieve a list of registered branches.                                                                                          |
| Stock Management               | T124           | Optional                                      | Query Commodity Category Pagination            | Used to query/get commodity category codes.                                                                                              |
| Stock Management               | T125           | Mandatory for excisable product taxpayers     | Query Excise Duty                              | Used to get excise duty codes. Applicable only to taxpayers dealing in excisable products.                                               |
| Stock Management               | T126           | Optional                                      | Get All Exchange Rates                         | Used to query exchange rates. Applicable when invoicing in foreign currencies.                                                           |
| Stock Management               | T130           | Mandatory                                     | Goods Upload                                   | Used to upload/configure products on EFRIS (can also be done via the web portal).                                                        |
| Stock Management               | T127           | Optional                                      | Goods/Services Inquiry                         | Retrieves products configured via T130 or the web portal.                                                                                |
| Stock Management               | T127           | Optional                                      | Goods/Services Inquiry by goods Code           | Retrieves specific product by code configured via T130 or web portal.                                                                    |
| Stock Management               | T128           | Optional                                      | Query Stock Quantity by Goods ID               | Retrieves stock quantities for specific goods.                                                                                           |
| Stock Management               | T131           | Optional (only for goods)                     | Goods Stock Maintain                           | Updates stock values for a product. Can also be done via the web portal.                                                                 |
| Stock Management               | T139           | Optional                                      | Goods Stock Transfer                           | Transfers goods between branches. Can also be done via the web portal.                                                                   |
| Invoice Management             | T109           | Mandatory                                     | Billing Upload                                 | Used to fiscalise e-receipts/invoices.                                                                                                   |
| Invoice Management             | T129           | Optional                                      | Batch Invoice Upload                           | Used to fiscalise multiple invoices/receipts in a single request.                                                                        |
| Invoice Management             | T108           | Optional                                      | Invoice Details                                | Validates fiscalised invoices/receipts using FDN, verification code, or QR code.                                                         |
| Invoice Management             | T106           | Optional                                      | Invoice / Receipt Query                        | Searches for fiscalised transactions with extended search parameters.                                                                    |
| Invoice Management             | T137           | Mandatory for special VAT treatment customers | Check Taxpayer Type                            | Checks VAT exemption/deeming status for a taxpayer or product.                                                                           |
| Credit/Debit Note Management   | T110           | Mandatory (for B2B & B2G buyers only)         | Credit Application                             | Applies for a credit note. Must be approved by URA before fiscalisation. Not required for B2C.                                           |
| Credit/Debit Note Management   | T110           | Mandatory (for B2B & B2G buyers only)         | Credit/Cancel Debit Note Application List      | Queries submitted credit note applications.                                                                                              |
| Credit/Debit Note Management   | T111           | —                                             | Credit Note Application Status Query           | Queries the status of a submitted credit note application (Approved/Rejected).                                                           |
| Credit/Debit Note Management   | T114           | Mandatory (for B2B & B2G buyers only)         | Credit Note Application Cancel                 | Cancels an already approved credit/debit note.                                                                                           |
| Credit/Debit Note Management   | T118           | Mandatory (for B2B & B2G buyers only)         | Query Credit Note / Cancel Application Details | Cancels a credit/debit note application that has not yet been approved.                                                                  |
| Credit/Debit Note Management   | T113           | Optional                                      | Credit Note Application Detail                 | Retrieves the details of a credit note application.                                                                                      |

---

## Credit Note Workflow

1. Invoice using `T109`
2. Raise Credit Note Application via `T110`
3. Query Application Status via `T111`
4. Get Verification/QR via `T108`
5. Cancel (if needed) via `T114` or `T118`

---

## Support

For technical assistance:

📧 Email: **[ebartile@gmail.com](ebartile@gmail.com)**
Include:

* TIN
* Device Number
* JSON Request/Response

📞 Call: **[+254757807150](+254757807150)**

---

## Software Integrators

If you're integrating on behalf of other businesses:

1. Present 3 successful UATs.
2. Receive **Certificate of Accreditation**.
3. Sign MOU and pay UGX 15,000 (stamp duty).
4. Submit:

   * Client appointment confirmation
   * EFRIS Digital Self-Signed Certificate form
   * OR CA-signed certificate

---
> 📌 For more code details: [https://docs.paybill.dev](https://docs.paybill.dev/en/ura-efris-sdk/)

> 📌 For more details, please refer to the official portal: [https://efris.ura.go.ug/](https://efris.ura.go.ug/)

---
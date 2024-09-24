import BaseAPIService from "./BaseAPIService";

class BillService extends BaseAPIService {
    // Fetch all products
    async getBill(): Promise<any> {
        return await this.request(`/bills`, "GET");
    }

    // Fetch a single product by ID
    async getBillById(billId: number): Promise<any> {
        return await this.request(`/bills/${billId}`, "GET");
    }

    // Create a new product
    async createBill(params: object): Promise<any> {
        return await this.request(`/bills`, "POST", params);
    }

    // Update an existing product
    async updateBill(billId: number, params: object): Promise<any> {
        return await this.request(`/bills/${billId}`, "PUT", params);
    }

    // Delete a product by ID
    async deleteBill(billId: number): Promise<any> {
        return await this.request(`/bills/${billId}`, "DELETE");
    }
}

export const billService = new BillService();